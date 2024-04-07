<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('PagedacceuilPFA');
})->name('home');

Route::get('/marketplace', function () {
    return view('Marketplace');
})->name('marketplace');

Route::get('/chatbot', function () {
    return view('chatbotAgriculture');
})->name('chatbot');

Route::get('/farm-management', function () {
    return view('Gestiondesfermes');
})->name('farm_management');

Route::get('/register-farmer', function () {
    return view('InscriptionAgriculteur');
})->name('register_farmer');

Route::get('/login-farmer', function () {
    return view('ConnexionAgriculteur');
})->name('login_farmer');

// Add other routes as needed...

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/jeudesimulation', function () {
    return view('jeudesimulation');
})->name('jeudesimulation');

use App\Http\Controllers\AgriculteurController;

Route::post('/inscription-agriculteur', [RegistrationController::class, 'register'])->name('inscription_agriculteur');
use App\Http\Controllers\LoginController;

Route::post('/connexion-agriculteur', [LoginController::class, 'login'])->name('connexion_agriculteur');

// You had duplicate routes for '/contact' and '/apropos', I removed the duplicates.

?>
