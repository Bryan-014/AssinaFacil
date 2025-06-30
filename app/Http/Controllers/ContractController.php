<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends ValidateController
{
    public function index()
    {
        $contracts = Contract::where('client_id', $this->get_user_id())->get();
        return view('client.dashboard', compact('contracts'));
    }
    
    public function pending()
    {
        $contracts = Contract::where('client_id', $this->get_user_id())->get();
        return view('client.pending.index', compact('contracts'));
    }
    
    public function store(Request $request)
    {
        Contract::create([
            'plan_id' => $request->route('plan_id'),
            'dealer_group_id' => 'a8f23ee1-53ab-11f0-8862-641c678d852c',
            'client_id' => $this->get_user_id(),
            'contract_date' => now(),
            'add_infos' => '{}'
        ]);
        
        session()->flash('alert', [
            'msg' => 'Serviço contratado com sucesso, efetue o pagamento para a liberação do serviço!',
            'title' => 'Suceesso'
        ]);
        return redirect()->route('services.list');
    }

    public function show(string $id)
    {
        $contracts = Contract::where('client_id', $this->get_user_id())->get();
        $contract_selected = Contract::find($id);
        if (isset($contract_selected)) {
            return view('client.dashboard', ['contracts' => $contracts, 'contract_selected' => $contract_selected]);
        }
        
        session()->flash('alert', [
            'msg' => 'Contrato não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route('client.dashboard');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }    
}
