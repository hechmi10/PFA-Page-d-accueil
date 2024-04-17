<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demoncontroller extends Controller
{
    public function game(){
        return view('game');
    }
}
