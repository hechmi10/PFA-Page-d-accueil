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
        
        if (!empty($mdp) && !empty($email)) {
            try {
                DB::table('agriculteurs inscription')->select([
                    'MotDePasse' => $mdp,
                    'Email' => $email
                ]);

                return redirect('/profile')->with("Connexion réussie");
            } catch (\Exception $e) {
                return "Connexion échouée, veuillez réessayer";
            }
        } else {
            return "Les champs sont obligatoires!";
        }
    }
}
