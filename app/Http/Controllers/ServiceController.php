<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Service;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends ValidateController
{    
    protected $validationRules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'base_price' => 'required|numeric',
        'base_duration' => 'required|numeric',
        'duration_type' => 'required',
        'picService' => 'file|mimes:jpg,jpeg,png|dimensions:min_width=300,min_height=300',
    ];

    protected $validationMessages = [
        'name.required' => 'O campo Serviço é obigatório',
        'name.min' => 'O campo Serviço deve conter ao menos 3 caracteres',
        'description.required' => 'O campo Descrição é obigatório',
        'base_price.required' => 'O campo Valor é obigatório',
        'base_price.numeric' => 'O campo Valor deve conter um valor numérico',
        'base_duration.required' => 'O campo Tempo do Plano é obigatório',
        'base_duration.numeric' => 'O campo Tempo do Plano deve conter um valor numérico',
        'duration_type.required' => 'O campo Tipo de Renovação é obigatório',
        'picService.file' => 'O campo Imagem deve ser um arquivo válido.',
        'picService.mimes' => 'O campo Imagem deve ser um arquivo do tipo: jpg, jpeg ou png.',
        'picService.dimensions' => 'A imagem deve estar em um formato retangular.',
    ];

    public function index()
    {        
        $services = Service::paginate(10);
        return view('admin.services.index', compact('services'));
    }    

    public function list()
    {
        $services = Service::all();
        return view('client.service.index', compact('services'));
    }
    
    public function create()
    {
        return view('admin.services.create');        
    }

    public function store(Request $request)
    {        
        $this->validate($request, $this->validationRules, $this->validationMessages, 'Erro ao cadastrar o serviço');

        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'base_plan_id' => ''
        ]);

        $defPlan = Plan::create([
            'service_id' => $service->id,
            'description' =>  $service->name,
            'price' => $request->base_price,
            'duration' => $request->base_duration,
            'duration_type' => $request->duration_type
        ]);

        $file = $request->file('picService');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = $service->id . '.' . $extension;
            $path = $file->storeAs('uploads', $fileName, 'public');
        }

        $service->base_plan_id = $defPlan->id;

        $service->save();

        session()->flash('alert', [
            'msg' => 'Serviço cadastrado com sucesso!',
            'title' => 'Sucesso'
        ]);
        return redirect()->route('plans.index', ['service_id' => $service->id]);
    }

    public function show(string $id)
    {
        $service = Service::find($id);
        if (isset($service)) {
            $defPlan = Plan::find($service->base_plan_id);
            return view('admin.services.show')->with('service', $service)->with('defPlan', $defPlan);    
        }

        session()->flash('alert', [
            'msg' => 'Serviço não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route('services.index');
    }

    public function view(string $id)
    {
        $service = Service::find($id);
        if (isset($service)) {
            $defPlan = Plan::find($service->base_plan_id);
            return view('client.service.show')->with('service', $service)->with('defPlan', $defPlan);    
        }

        session()->flash('alert', [
            'msg' => 'Serviço não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route('services.list');
    }

    public function edit(string $id)
    {
        $service = Service::find($id);
        
        if (isset($service)) {
            $defPlan = Plan::find($service->base_plan_id);
            return view('admin.services.edit', ['id' => $service->id])->with('service', $service)->with('defPlan', $defPlan);
        }
        
        session()->flash('alert', [
            'msg' => 'Serviço não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route('services.index');
    }

    public function update(Request $request, string $id)
    {
        $service = Service::find($id);
        if (isset($service)) {
            $defPlan = Plan::find($service->base_plan_id);

            $this->validate($request, $this->validationRules, $this->validationMessages, 'Erro ao atualizar o serviço');

            $service->name = $request->name;
            $service->description = $request->description;
            $service->save();

            switch ($request->duration_type) {
                case 1:
                    $modality = 'Diário';
                    break;
                case 2:
                    $modality = 'Semanal';
                    break;
                case 3:
                    $modality = 'Mensal';
                    break;
                case 4:
                    $modality = 'Anual';
                    break;
                
                default:
                    $modality = '';
                    break;
            }

            $defPlan = Plan::find($service->base_plan_id);
            if ($defPlan) {
                if (!($defPlan->price == $request->base_price && $defPlan->duration == $request->base_duration && $defPlan->duration_type == $modality)) {
                    $defPlan->price = $request->base_price;
                    $defPlan->duration = $request->base_duration;
                    $defPlan->duration_type = $request->duration_type;
                    $defPlan->save();
                }
            }
            
            $file = $request->file('picService');
            if ($file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = $service->id . '.' . $extension;
                $path = $file->storeAs('uploads', $fileName, 'public');
            }
                    
            session()->flash('alert', [
                'msg' => 'Serviço atualizado com sucesso!',
                'title' => 'Sucesso'
            ]);
            return redirect()->route('services.edit', ['id' => $service->id])->with('service', $service)->with('defPlan', $defPlan);    
        }
        session()->flash('alert', [
            'msg' => 'Serviço não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route('services.index', ['id' => $service->id]);
    }

    public function destroy(string $id)
    {
        $service = Service::find($id);
        
        if (isset($service)) {
            $service->delete();
            session()->flash('alert', [
                'msg' => 'Serviço deletado com sucesso!',
                'title' => 'Sucesso'
            ]);
            return redirect()->route('services.index');
        }
        
        session()->flash('alert', [
            'msg' => 'Serviço não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route('services.index');
    }
}
