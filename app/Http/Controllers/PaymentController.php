<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Payment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentController extends ValidateController
{
    public function index()
    {
        $payments = Payment::paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    public function history()
    {
        $user = Auth::user();
        $userId = $user->id;

        $contracts = Contract::where('client_id', $userId)->get();

        $payments = [];

        foreach ($contracts as $contract) {
            foreach ($contract->payments as $payment) {
                array_push($payments, $payment);                
            }
        }

        return view('client.history.index', compact('payments'));
    }

    public function create(Request $request)
    {
        $contracts = Contract::all();
        $contract = Contract::find($request->route('id'));
        return view('client.pending.index', ['contracts' => $contracts, 'contract_select' => $contract]);
    }

    public function store(Request $request)
    {
        $contract = Contract::find($request->route('contract_id'));
        Payment::create([
            'contract_id' => $request->route('contract_id'),
            'pay_date' => now(),
            'value' => $contract->plan->price,
            'plan_id' => $contract->plan_id
        ]);
        
        session()->flash('alert', [
            'msg' => 'Pagamento realizado com sucesso!',
            'title' => 'Suceesso'
        ]);
        return redirect()->route('pending.index');
    }

    public function show(Request $request, string $id)
    {
        $payment = Payment::find($id);
        if ($request->route()->getName() == 'payments.show') {
            return view('client.history.show', ['payment' => $payment]);
        }
        return view('admin.payments.show', ['payment' => $payment]);
    }
}
