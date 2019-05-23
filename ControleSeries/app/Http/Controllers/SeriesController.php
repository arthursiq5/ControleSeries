<?php
  namespace App\Http\Controllers;
  use Illuminate\Http\Request;
  use App\Serie;

  class SeriesController extends Controller{
    public function index(Request $request){
      $series = Serie::all();

      // return view('series.index', ['series' => $series]); // retorna uma view do arquivo series/index.php com o uso das variaveis entre colchetes '[]'

      return view('series.index', compact('series')); // retorna um array com a variavel $series sendo usada em conjunto com a chave 'series'
    }

    public function create(){
      return view('series.create');
    }

    public function store(Request $request){
      /*$nome = $request->get('nome'); // pega os dados enviados pelo post do formulario
      var_dump(Serie::create([
        'nome' => $nome
      ]));*/
      $serie = Serie::create($request->all());
      echo "serie {$serie->nome} com id {$serie->id} criada";
    }
  }
 ?>
