<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use App\Models\Agriculteur;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Method to show the contact page
    public function show(Request $request)
    {
        try {
            // Récupérer l'agriculteur par son adresse email
            $agriculteur = ProfileController::showProfile($request);
            // Passer le nom à la vue
             return view('contact2')->with('agriculteur',$agriculteur);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            // Aucun agriculteur trouvé avec l'adresse email spécifiée
            return redirect()->route('login_farmer')->with('error', 'Aucun compte trouvé avec cette adresse email.');
        } catch (QueryException $exception) {
            // Gérer l'exception ici, par exemple rediriger vers la page de connexion avec un message d'erreur
            return redirect()->route('login_farmer')->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }
}
