<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Method to show the contact page
    public function show()
    {
        $data = [
            'phoneNumber1' => '11223344',
            'phoneNumber2' => '55667788',
            'phoneNumber3' => '99001122',
            'phoneNumber4' => '33445566',
            'phoneNumber5' => '77889900',
        ];

        return view('contact', $data);
    }
}
