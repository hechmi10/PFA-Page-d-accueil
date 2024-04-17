<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Culture;

class SuiviCultureController extends Controller
{
    public function enregistrer(Request $request) // Utilisation de la classe de demande de validation
    {
        // Les données ont déjà été validées par la classe de demande de validation

        // Création d'une nouvelle entrée dans la base de données en utilisant Eloquent ORM
        Culture::create([
            'nom_culture' => $request->nom_culture,
            'date_plantation' => $request->date_plantation,
            'type_sol' => $request->type_sol,
            'quantite' => $request->quantite,
            'description' => $request->description,
        ]);

        // Redirection avec un message de succès
        return redirect('/')->with('success', 'La culture a été enregistrée avec succès.');
    }
}
