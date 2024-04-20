<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $cin = $request->input('cin');
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $mdp = $request->input('mdp');
        $email = $request->input('email');
        $numtel = $request->input('numtel');
        

        if (!empty($cin) && !empty($nom) && !empty($prenom) && !empty($mdp) && !empty($email) && !empty($numtel)) {
            try {
                DB::table('agriculteurs inscription')->insert([
                    'Cin' => $cin,
                    'Nom' => $nom,
                    'Prènom' => $prenom,
                    'MotDePasse' => $mdp,
                    'Email' => $email,
                    'NumTel' => $numtel
                ]);

                return redirect("/profile")->with("Inscription réussie");
            } catch (\Exception $e) {
                return "Inscription échouée, veuillez réessayer";
            }
        } else {
            return "Les champs sont obligatoires!";
        }
    }
}
?>
