<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ValidateController extends Controller
{
    public function validate(Request $request, Array $validationRules, Array $validationMessages, string $errorMessage) {
        try {
            $request->validate($validationRules, $validationMessages);
        } catch (\Throwable $th) {
            session()->flash('alert', [
                'msg' => $errorMessage,
                'title' => 'Erro'
            ]);
            $request->validate($validationRules, $validationMessages);
        }
    } 

    public function get_user_id() {
        return Auth::user()->id;
    }
}