<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgriculteurController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cin' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'mdp' => 'required',
            'email' => 'required|email',
            'numtel' => 'required',
        ]);
        Agriculteur::create($validatedData);

        return "Inscription réussie";
    }
    //
}
