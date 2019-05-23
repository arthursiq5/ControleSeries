<?php
  namespace App\Http\Controllers;
  use Illuminate\Http\Request;

  class SeriesController extends Controller{
    public function index(Request $request){
      $series = [
          'Grey\'s Anatomy',
          'Lost',
          'Agents of SHIELD'
      ];

      // return view('series.index', ['series' => $series]); // retorna uma view do arquivo series/index.php com o uso das variaveis entre colchetes '[]'

      return view('series.index', compact('series')); // retorna um array com a variavel $series sendo usada em conjunto com a chave 'series'
    }
  }
 ?>
