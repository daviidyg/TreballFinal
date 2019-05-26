<?php

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
use App\Pintura;
use App\Figura;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('home');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect/{service}', 'SocialAuthController@redirect');
Route::get('/callback/{service}', 'SocialAuthController@callback');
Route::get('profile', 'UserController@profile');
Route::get('profile/update/', 'UserController@UpdateProfile');
Route::get('add/pinturas/', 'PinturaController@nuevapintura');
Route::get('add/figuras/', 'FigurasController@nuevaminiatura');
Route::post('add/figuras/edit/{figuras}', 'FigurasController@update');
Route::resource('figuras','FigurasController');
Route::resource('pinturas','PinturaController');
Route::delete('/add/figuras/delete/{figuras}', 'FigurasController@destroy');
Route::post('profile/update/avatar', 'UserController@update_avatar');
Route::post('/profile/update/banner', 'UserController@update_banner');
Route::get('hola/test', 'FigurasController@addpinturaf');
Route::get('noticias/all', 'NoticiasController@index');
Route::get('noticias/add', 'NoticiasController@nuevanoticia');
Route::post('noticias/add/new/', 'NoticiasController@store');
Route::any ( '/search', function () {
    $q = Input::get ( 'q' );
    $pintura = Figura::where ( 'nombre_figuras', 'LIKE', '%' . $q . '%' )->orWhere ( 'nombre_figuras', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $pintura ) > 0)
        return view ( 'user.profile' )->withDetails ( $pintura )->withQuery ( $q );
    else
        return view ( 'user.profile' )->withMessage ( 'No Details found. Try to search again !' );
} );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
