<?php
namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Method to show the contact page
    public function showContact(Request $request)
    {
        // Assuming showProfile() is a method within ProfileController
        $profileController = new ProfileController();
        $agriculteur = $profileController->showProfile($request); // Assuming showProfile returns $agriculteur
        return view('contact2', compact('agriculteur'));
    }
}
?>