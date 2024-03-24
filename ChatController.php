<?php

namespace App\Http\Controllers;

use app\Http\Request;

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('message');
        $response = $this->processMessage($message);
        return response()->json(['reply' => $response]);
    }

    private function processMessage($message)
    {
        return "Hello! You said: $message";
    }
}
?>