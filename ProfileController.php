<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agriculteur; // Supposons que vous ayez un modèle Agriculteur
use Illuminate\Database\QueryException; // Importez QueryException

class ProfileController extends Controller
{
    public static function showProfile(Request $request)
    {
        try {
            // Récupérer l'agriculteur par son adresse email
            $agriculteur = Agriculteur::where('Email', $request->input('email'))->firstOrFail();
            // Passer le nom à la vue
             return view('profile')->with('agriculteur',$agriculteur);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            // Aucun agriculteur trouvé avec l'adresse email spécifiée
            return redirect()->route('login_farmer')->with('error', 'Aucun compte trouvé avec cette adresse email.');
        } catch (QueryException $exception) {
            // Gérer l'exception ici, par exemple rediriger vers la page de connexion avec un message d'erreur
            return redirect()->route('login_farmer')->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }
    
        
} 
?>
