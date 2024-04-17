<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\simulation2;
use Illuminate\Support\Facades\DB;
class SimulationController extends Controller

{
    public function enregistrer(Request $request){
        // Vérifiez si les valeurs sont définies
        $validatedData = $request->validate([
            'totalprix' => 'required|numeric',
            'totalProduct' => 'required|numeric',
            'netpayment' => 'required|numeric',
            'gain' => 'required|numeric' 
        ]);
        $simuler = simulation2::create($validatedData);
        return redirect('/')->with('success', 'Enregistrement enregistré avec succès.');
    }
}
