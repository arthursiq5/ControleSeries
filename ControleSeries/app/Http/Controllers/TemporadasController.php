<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temporada;
use App\Serie;

class TemporadasController extends Controller
{
    public function index(int $serieId){
      $serie = Serie::find($serieId); // lista de temporadas que devem ser exibidas em uma view
      $temporadas = $serie->temporadas;
      return view('temporadas.index', compact('serie','temporadas'));
    }
}
