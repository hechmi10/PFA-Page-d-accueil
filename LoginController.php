<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $mdp = $request->input('mdp');
        
        $user = DB::table('agriculteurs')
                    ->where('Email', $email)
                    ->where('MotDePasse', $mdp)
                    ->first();
        
        if ($user) {
            return "Connexion réussie !";
        } else {
            return "Identifiants incorrects. Veuillez réessayer.";
        }
    }
}
