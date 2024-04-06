<?php
namespace app\Http;
use Illuminate\Http\Request;
use App\Models\Message;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use app\Http;
Http::get('/', function () {
    return view('PagedacceuilPFA');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Http::group(['middleware' => ['web']], function () {
    //
});
use App\Http\Controllers\ContactController;

Http::get('/contact', [ContactController::class, 'show']);
use App\Http\Controllers\AboutController;

Http::get('/apropos', [AboutController::class, 'show']);
Http::post('/register', 'RegistrationController@register')->name('register');
Http::get('/inscription', function () {
    return view('InscriptionAgriculteur');
});

Http::get('/connexion', function () {
    return view('ConnexionAgriculteur');
});

Http::get('/contact', function () {
    return view('contact');
});

Http::get('/apropos', function () {
    return view('aproposAgriConnect');
});


?>