<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temporada;
use App\Serie;

class TemporadasController extends Controller
{
  public function __construct(){
    $this->middleware('auth'); // antes de qualquer metodo de dentro desse controller ser acessado, ele vai passar pelo 'meio de campo', middleware 'auth'
  }
  public function index(int $serieId){
    $serie = Serie::find($serieId); // lista de temporadas que devem ser exibidas em uma view
    $temporadas = $serie->temporadas;
    return view('temporadas.index', compact('serie','temporadas'));
  }
}
