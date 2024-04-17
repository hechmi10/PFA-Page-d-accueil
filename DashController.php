<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    // Méthode pour afficher la page de simulation
    public function index()
    {
        return view('simulation1'); // Charge la vue 'simulation.blade.php'
    }    }
