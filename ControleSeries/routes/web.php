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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', 'SeriesController@index')
  ->name('index');
  //->middleware('auth'); // faça o 'meio de campo', manipule a requisiçao atraves da classe 'auth', do Laravel

Route::get('/series/criar', 'SeriesController@create')
  ->name('adiciona_serie')
  ->middleware('autenticador');

Route::post('/series/criar', 'SeriesController@store')
  ->middleware('autenticador');

Route::delete('/series/{id}', 'SeriesController@destroy')
  ->middleware('autenticador');

Route::post('/series/{id}/editaNome', 'SeriesController@editaNome')
  ->middleware('autenticador');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')
  ->middleware('autenticador');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index')
  ->name('entrar');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');

Route::get('/sair', function(){
  \Illuminate\Support\Facades\Auth::logout();
  return redirect('/entrar');
});
?>
