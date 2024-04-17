<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'product_name' => 'required|string',
            'quantity' => 'required|numeric',
            'purchase_date' => 'required|date',
            'supplier' => 'required|string' 
        ]);

        // Créer une nouvelle entrée dans la table Stock avec les données validées
        $stock = Stock::create($validatedData);

        // Redirection avec un message de succès
        return redirect('/')->with('success', 'Le stock a été enregistré avec succès.');
    }
}
