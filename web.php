<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AgriculteurController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SuiviCultureController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PlanificationRecolteController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\demoncontroller;
use App\Http\Controllers\SimulationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\FetchUserDetails;
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
    return view('game');
})->name('jeudesimulation');
Route::get('/dashboard',function(){
    return view('dash');
})->name('dashboard');

Route::post('/inscription-agriculteur', [RegistrationController::class, 'register'])->name('inscription_agriculteur');

Route::post('/connexion-agriculteur', [LoginController::class, 'login'])->name('connexion_agriculteur');
Route::post('/profile',[ProfileController::class,'showProfile'])->name('Profile');
Route::match(['get', 'post'], 'profile', [ProfileController::class,'showProfile']);
Route::match(['get', 'post'], 'contact2', [ContactController::class,'showContact']);
Route::post('/contact2',[ContactController::class,'showContact'])->name('contact2');
Route::get('/map',function(){
    return view('map');
})->name('map');
Route::get('/project',function(){
    return view('project');
})->name('project');
Route::get('/settings',function(){
    return view('settings');
})->name('settings');
Route::get('/Message',function(){
    return view('Whatsup_Messenger (1)');
})->name('Message');
Route::post('/Messagebackend',[MessageController::class,'messaging'])->name('Messagebackend');
// You had duplicate routes for '/contact' and '/apropos', I removed the duplicates.
Route::get('/suiviculture',function(){
    return view('suiviculture');
})->name('culture');
Route::get('/gestionstock',function(){
    return view('gestionstock');
})->name('stock');
Route::get('/planificationrecolte',function(){
    return view('planificationrecolte');
})->name('recolte');
Route::post('/planification_recolte', [PlanificationRecolteController::class, 'store'])->name('planification_recolte');
Route::post('/traitement_formulaire', [SuiviCultureController::class, 'enregistrer'])->name('traitement_formulaire');
Route::post('/submit_stock', [StockController::class, 'store'])->name('submit_stock');
Route::post('/simuler', 'DashController@index')->name('simuler');
Route::post('/enregistrer',[SimulationController::class,'enregistrer'])->name('enregistrer');
Route::get('/notifications',function(){
    return view('Bootstrap 5 Notification Page Design snippets example');
})->name('notifications');
?>
