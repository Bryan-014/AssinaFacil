<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Payment;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\SvgWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends ValidateController
{
    private $API_BASE_URL = 'https://matls-clients.api.stage.cora.com.br';
    private $API_CLIENT_ID = 'int-6TIkerwUCI08yTXuRZNsTO';
    private $API_CERT = 'C:/Users/Bryan Rosa/Documents/cert_key_cora/cert_key_cora_stage_2025_07_07/certificate.pem';
    private $API_KEY = 'C:/Users/Bryan Rosa/Documents/cert_key_cora/cert_key_cora_stage_2025_07_07/private-key.key';

    private function getApiToken() {
        $client = new Client();

        $response = $client->request('POST', $this->API_BASE_URL.'/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $this->API_CLIENT_ID
            ],
            'cert' => $this->API_CERT,
            'ssl_key' => $this->API_KEY,
        ]);

        return json_decode($response->getBody()->getContents())->access_token;
    }

    private function generateInvoice(Contract $contract) {
        $client = new Client();

        $due_date = Carbon::createFromFormat('d/m/Y', $contract->calc_validity());

        $response = $client->request('POST', $this->API_BASE_URL.'/v2/invoices/', [
            'body' => '
            {
                "code": "'.(string) Str::uuid().'",
                "customer": {
                    "name": "'.$contract->client->user.'",
                    "email": "'.$contract->client->email.'",
                    "document": {
                        "identity": "'.$contract->client->document.'",
                        "type": "CPF"
                    }
                },
                "services": [{
                    "name": "'.$contract->plan->service->name.'",
                    "description": "'.$contract->plan->service->description.'",
                    "amount": '.$contract->plan->unmask_price.'
                }],
                "payment_terms": {
                    "due_date": "'.$due_date->format('Y-m-d').'"
                },
                "payment_forms":["BANK_SLIP","PIX"]
            }',
            'headers' => [
                'Idempotency-Key' => (string) Str::uuid(),
                'Authorization' => 'Bearer '.$this->getApiToken(),
                'content-type' => 'application/json',
            ],
            'cert' => $this->API_CERT,
            'ssl_key' => $this->API_KEY,
        ]);

        return json_decode($response->getBody()->getContents());
    }

    private function getInvoice(string $invoice_id) {
        $client = new Client();

        $response = $client->request('GET', $this->API_BASE_URL.'/v2/invoices/'.$invoice_id, [
            'headers' => [
                'Idempotency-Key' => (string) Str::uuid(),
                'Authorization' => 'Bearer '.$this->getApiToken(),
                'content-type' => 'application/json',
            ],
            'cert' => $this->API_CERT,
            'ssl_key' => $this->API_KEY,
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function index()
    {        
        $payments = Payment::whereNotNull('pay_date')->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    public function history()
    {        
        $userId = Auth::user()->id;

        $contracts = Contract::where('client_id', $userId)->get();

        $payments = [];

        foreach ($contracts as $contract) {
            foreach ($contract->payments as $payment) {
                if ($payment->pay_date != null) array_push($payments, $payment);                                
            }
        }

        return view('client.history.index', compact('payments'));
    }

    public function create(Request $request)
    {        
        $userId = Auth::user()->id;
        $contracts = Contract::where('client_id', $userId)->get();
        $contract = Contract::find($request->route('id'));    
        
        $unpayInvoice = Payment::where('pay_date', null)
            ->where('contract_id', $request->route('id'))->get();
                    
        if (count($unpayInvoice) == 0) {
            $invoice_infos = $this->generateInvoice($contract);
    
            Payment::create([
                'contract_id' => $request->route('id'),
                'pay_date' => null,
                'value' => $contract->plan->price,
                'plan_id' => $contract->plan_id,
                'invoice_id' => $invoice_infos->id
            ]);
        } else {
            $invoice_infos = $this->getInvoice($unpayInvoice[0]->invoice_id);
        }

        $qrcode = new Builder(
            writer: new SvgWriter(),
            data: $invoice_infos->pix->emv,
            size: 300,
            margin: 10
        );

        return view('client.pending.index', ['contracts' => $contracts, 'contract_select' => $contract, 'qrcode' => $qrcode->build()->getDataUri(), 'invoice' => $invoice_infos]);
    }

    public function show(Request $request, string $id)
    {        
        $payment = Payment::find($id);
        if ($request->route()->getName() == 'payments.show') {
            return view('client.history.show', ['payment' => $payment]);
        }
        return view('admin.payments.show', ['payment' => $payment]);
    }   
    
    public function store() {
        if ($this->verifyInvoices()) {
            session()->flash('alert', [
                'msg' => 'Pagamento efetuado com sucesso!',
                'title' => 'Suceesso'
            ]);
        }
        return redirect()->route('pending.index');
    } 

    private function verifyInvoices() {
        $payments = Payment::whereNull('pay_date')->get();
        $return = false;

        foreach ($payments as $payment) {
            if ($this->getInvoice($payment->invoice_id)->status == 'PAID') {
                $payment->pay_date = now();
                $payment->save();
                $return = true;
            }            
            //REMOVE FOR PROD
            
            $payment->pay_date = now();
            $payment->save();
            $return = true;
            
            // dd($payments);
            // --------------
        }
        return $return;
    }
}
