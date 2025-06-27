<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends ValidateController
{
    protected $validationRules = [
        'user' => 'required|min:3',
        'email' => 'required|email',
    ];

    protected $validationMessages = [
        'user.required' => 'O campo nome é obigatório',
        'user.min' => 'O campo nome deve conter ao menos 3 caracteres',
        'email.required' => 'O campo email é obigatório',
        'email.email' => 'O campo email deve conter um email válido',
    ];

    public function clients()
    {
        $clients = User::where('role_id', env('CLIENT_ROLE_ID'))->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    public function resellers()
    {
        $resellers = User::where('role_id', env('DEALER_ROLE_ID'))->paginate(10);
        return view('admin.resellers.index', compact('resellers'));
    }

    public function store(Request $request)
    {
        $dataReturn = $this->check_role($request->route()->getName(), 'store');

        $this->validate($request, $this->validationRules, $this->validationMessages, 'Erro ao cadastrar o '.$dataReturn[0]);   
        
        $user = new User();

        $user->user = $request->user;
        $user->email = $request->email;
        $user->password = Hash::make($request->email);
        
        $user->role_id = $request->route()->getName() == 'clients.store' ? env('CLIENT_ROLE_ID') : env('DEALER_ROLE_ID');
        $user->save();
        
        session()->flash('alert', [
            'msg' => $dataReturn[0].' cadastrado com sucesso!',
            'title' => 'Sucesso'
        ]);
        return redirect()->route($dataReturn[1].'.index');
    }

    public function show(Request $request, string $id)
    {
        $dataReturn = $this->check_role($request->route()->getName(), 'show');

        $user = User::find($id);
        if (isset($user)) {
            return view('admin.'.$dataReturn[1].'.show')->with('user', $user);    
        }

        session()->flash('alert', [
            'msg' => $dataReturn[0].' não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route($dataReturn[1].'.index');
    }

    public function update(Request $request, string $id)
    {
        $dataReturn = $this->check_role($request->route()->getName(), 'update');

        $user = User::find($id);
        if (isset($user)) {
            $this->validate($request, $this->validationRules, $this->validationMessages, 'Erro ao atualizar o '.$dataReturn[0]);

            $user->user = $request->user;
            $user->email = $request->email;
            
            $user->save();

            session()->flash('alert', [
                'msg' => $dataReturn[0].' atualizado com sucesso!',
                'title' => 'Sucesso'
            ]);
            return redirect()->route($dataReturn[1].'.index');
        }
        
        session()->flash('alert', [
            'msg' => $dataReturn[0].' não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route($dataReturn[1].'.index');
    }

    public function destroy(Request $request, string $id)
    {
        $dataReturn = $this->check_role($request->route()->getName(), 'destroy');

        $user = User::find($id);
        
        if (isset($user)) {
            $user->delete();
            session()->flash('alert', [
                'msg' => $dataReturn[0].' deletado com sucesso!',
                'title' => 'Sucesso'
            ]);
            return redirect()->route($dataReturn[1].'.index');
        }
        
        session()->flash('alert', [
            'msg' => $dataReturn[0].' não encontrado!',
            'title' => 'Atenção'
        ]);
        return redirect()->route($dataReturn[1].'.index');
    }

    private function check_role($route, $sufix) {
        if ($route == 'clients.'.$sufix) {
            return [
                'Cliente',
                'clients'
            ];
        } elseif ($route == 'resellers.'.$sufix) {
            return [
                'Revendedor',
                'resellers'
            ];
        }
    }
}
