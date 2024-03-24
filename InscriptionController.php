<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agriculteur;

class AgriculteurController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cin' => 'required|string|max:255|unique:agriculteurs',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'mdp' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:agriculteurs',
            'numtel' => 'required|string|max:8',
        ]);
        $agriculteur = new Agriculteur();
        $agriculteur->Cin = $validatedData['cin'];
        $agriculteur->Nom = $validatedData['nom'];
        $agriculteur->Prènom = $validatedData['prenom'];
        $agriculteur->MotDePasse = bcrypt($validatedData['mdp']);
        $agriculteur->Email = $validatedData['email'];
        $agriculteur->NumTel = $validatedData['numtel'];
        $agriculteur->save();
        return redirect()->route('InscriptionAgriculteurbackend.blade.php')->with('success', 'Inscription réussie');
    }
}
