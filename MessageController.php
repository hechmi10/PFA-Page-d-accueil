<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MessageController extends Controller
{
    public function messaging(Request $request){
        $message=$request->input('message');
        if(!empty($message)){
            try {
                DB::table('Messages')->insert([
                    'Message'=> $message
                ]);

                return "Envoi réussie";
            } catch (\Exception $e) {
                return "Envoi échouée, veuillez réessayer";
            }
        } else {
            return "L'envoi est obligatoire!";
        }
    }
    
}
