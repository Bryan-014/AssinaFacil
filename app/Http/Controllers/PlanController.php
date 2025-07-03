<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Plan;

use Illuminate\Http\Request;

class PlanController extends ValidateController
{
    protected $validationRules = [
        'description' => 'required',
        'price' => 'required|numeric',
        'duration' => 'required|numeric',
        'duration_type' => 'required'
    ];

    protected $validationMessages = [
        'description.required' => 'O campo Descrição é obigatório',
        'price.required' => 'O campo Valor é obigatório',
        'price.numeric' => 'O campo Valor deve conter um valor numérico',
        'duration.required' => 'O campo Tempo do Plano é obigatório',
        'duration.numeric' => 'O campo Tempo do Plano deve conter um valor numérico',
        'duration_type.required' => 'O campo Tipo de Renovação é obigatório',
    ];

    public function index(Request $request)
    {
        $service_id = $request->route('service_id');
        
        $plans = Plan::where('service_id', $service_id)->paginate(10);
        return view('admin.services.plans.index', compact('plans'))->with('service_id', $service_id);
    }

    public function create(Request $request)
    {
        $service_id = $request->route('service_id');
        return view('admin.services.plans.create', compact('service_id'));        
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules, $this->validationMessages);

        Plan::create($request->all());

        session()->flash('alert', [
            'msg' => 'Plano cadastrado com sucesso!',
            'title' => 'Sucesso'
        ]);
        return redirect()->route('plans.index', ['service_id' => $request->route('service_id')]);
    }

    public function edit(Request $request, string $id)
    {
        $plan = Plan::find($request->route('id'));
        $service_id = $request->route('service_id');
        
        if (isset($plan)) {
            return view('admin.services.plans.edit', ['id' => $plan->id, 'service_id' => $service_id])->with('plan', $plan);
        }
        
        session()->flash('alert', [
            'msg' => 'Plano não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route('plans.index', compact('service_id'));
    }

    public function update(Request $request, string $id)
    {
        $plan = Plan::find($request->route('id'));
        if ($plan) {
            $request->validate($this->validationRules, $this->validationMessages);

            $plan->description = $request->description;
            $plan->price = $request->price;
            $plan->duration = $request->duration;
            $plan->duration_type = $request->duration_type;
            
            $plan->save();

            session()->flash('alert', [
                'msg' => 'Plano atualizado com sucesso!',
                'title' => 'Sucesso'
            ]);
            return redirect()->route('plans.edit', ['service_id' => $request->route('service_id'), 'id' => $plan->id]);
        }
        session()->flash('alert', [
            'msg' => 'Plano não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route('plans.index', ['service_id' => $request->route('service_id')]);
    }

    public function destroy(Request $request, string $id)
    {
        $plan = Plan::find($request->route('id'));
        
        if (isset($plan)) {
            if ($plan->id == $plan->service->base_plan_id) {
                session()->flash('alert', [
                    'msg' => 'Não é possível deletar o plano padrão!',
                    'title' => 'Atenção'
                ]);
                return redirect()->route('plans.index', compact('service_id'));
            }
            $plan->delete();
            session()->flash('alert', [
                'msg' => 'Plano deletado com sucesso!',
                'title' => 'Sucesso'
            ]);
            return redirect()->route('plans.index', compact('service_id'));
        }
        
        session()->flash('alert', [
            'msg' => 'Plano não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route('plans.index', compact('service_id'));
    }
}