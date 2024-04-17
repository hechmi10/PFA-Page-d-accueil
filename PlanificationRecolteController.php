<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; // Import de la classe de demande de validation
use App\Models\PlanificationRecolte;

class PlanificationRecolteController extends Controller
{
    public function store(Request $request) // Utilisation de la classe de demande de validation
    {
        // Les données ont déjà été validées par la classe de demande de validation
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'date_recolte_prevue' => 'required|date',
            'main_oeuvre' => 'required|string',
            'equipement' => 'required|string',
            'culture_id' => 'required|exists:cultures,id'
        ]);

        // Création d'une nouvelle entrée dans la base de données en utilisant Eloquent ORM
        PlanificationRecolte::create($request->validated());

        // Redirection avec un message de succès
        return redirect('/')->with('success', 'La planification de récolte a été enregistrée avec succès.');
    }
}
