<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agriculteur; // Make sure to import the Agriculteur model

class AgriculteurController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'cin' => 'required|string|max:255|unique:agriculteurs', // Example validation rules, adjust as needed
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'mdp' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:agriculteurs',
            'numtel' => 'required|string|max:8',
        ]);

        // Create a new Agriculteur instance and save it to the database
        $agriculteur = new Agriculteur();
        $agriculteur->Cin = $validatedData['cin'];
        $agriculteur->Nom = $validatedData['nom'];
        $agriculteur->Prènom = $validatedData['prenom'];
        $agriculteur->MotDePasse = bcrypt($validatedData['mdp']); // Hash the password for security
        $agriculteur->Email = $validatedData['email'];
        $agriculteur->NumTel = $validatedData['numtel'];
        $agriculteur->save();

        // Optionally, you can return a response or redirect the user
        return redirect()->route('InscriptionAgriculteurbackend.blade.php')->with('success', 'Inscription réussie');
    }
}
