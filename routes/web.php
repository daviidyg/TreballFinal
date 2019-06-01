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


Route::get('/', array( 'as' => 'home', 'uses' => 'HomeController@index' ));
Route::get('/redirect/{service}', 'SocialAuthController@redirect');
Route::get('/callback/{service}', 'SocialAuthController@callback');
Route::get('profile', 'UserController@index');
Route::get('profile/update/', 'UserController@UpdateProfile');
Route::get('add/pinturas/', 'PinturaController@nuevapintura');
Route::get('add/figuras/', 'FigurasController@nuevaminiatura');
Route::post('add/figuras/update/', 'FigurasController@update');
Route::resource('figuras','FigurasController');
Route::resource('pinturas','PinturaController');
Route::delete('/add/figuras/delete/{id_figuras}', 'FigurasController@destroy');
Route::get('noticias/all', 'NoticiasController@index');
Route::get('noticias/add', 'NoticiasController@nuevanoticia');
Route::post('noticias/add/new/', 'NoticiasController@store');
Route::get('noticias/{id_noticias}', 'NoticiasController@MostrarNoticia');
Route::get('add/figuras/ajax/{id_figuras}','FigurasController@edit');
Route::delete('add/pinturas/delete/{id_pintura}','PinturaController@destroy');
Route::post("perfil/pintura","InventarioController@store");
Route::delete('profile/ajaxdelete/{id}','InventarioController@destroy');
Route::get('profile/inventario','UserController@profile');
Route::get('profile/datos','UserController@update');
Route::post('profile/datos/fotos','UserController@addimages');
Route::post('profile/datos/edit','UserController@EditarUsuario');
Route::get('/figuras','FigurasController@index');
Route::post('/add/figuras/edit','FigurasController@edit');
Route::post('add/figuras/pdf/upload/{id_figuras}', 'FigurasController@UploadPDF');
Route::post('add/figuras/procedimiento/{id_figuras}', 'FigurasController@Procedimiento');
Route::get('figuras/all/{id_figuras}','FigurasController@mostrarcompleta');
Route::any ( '/search', function () {
    $q = Input::get ( 'q' );
    $pintura = Figura::where ( 'nombre_figuras', 'LIKE', '%' . $q . '%' )->orWhere ( 'nombre_figuras', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $pintura ) > 0)
        return view ( 'user.profile' )->withDetails ( $pintura )->withQuery ( $q );
    else
        return view ( 'user.profile' )->withMessage ( 'No Details found. Try to search again !' );
} );

Auth::routes();

