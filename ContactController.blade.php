<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        $phoneNumbers = [
            '11223344',
            '55667788',
            '99001122',
            '33445566',
            '77889900'
        ];

        return view('contact', ['phoneNumbers' => $phoneNumbers]);
    }
}
