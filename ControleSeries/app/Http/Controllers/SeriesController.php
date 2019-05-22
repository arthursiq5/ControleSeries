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

      return view('series.index', ['series' => $series]); // retorna uma view do arquivo series/index.php com o uso das variaveis entre colchetes '[]'
    }
  }
 ?>
