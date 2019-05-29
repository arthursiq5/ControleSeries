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
  ->name('adiciona_serie');

Route::post('/series/criar', 'SeriesController@store');

Route::delete('/series/{id}', 'SeriesController@destroy');

Route::post('/series/{id}/editaNome', 'SeriesController@editaNome');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
?>
