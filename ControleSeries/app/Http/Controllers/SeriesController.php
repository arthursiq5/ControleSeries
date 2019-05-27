<?php
  namespace App\Http\Controllers;
  use Illuminate\Http\Request;
  use App\Http\Requests\SeriesFormRequest;
  use App\Serie;
  use App\Temporada;
  use App\Episodio;
  use App\Services\CriadorDeSerie;

  class SeriesController extends Controller{
    public function index(Request $request){
      $series = Serie::query() // informa que vai realizar uma query
        ->orderBy('nome') // ordena os dados pelo nome
        ->get(); // pega todos os dados (SELECT * FROM tabela)

      $mensagem = $request->session()->get('mensagem');
      // return view('series.index', ['series' => $series]); // retorna uma view do arquivo series/index.php com o uso das variaveis entre colchetes '[]'
      // $request->session()->remove('mensagem'); // removendo a mensagem da sessao apos a utilizacao


      return view('series.index', compact('series', 'mensagem')); // retorna um array com a variavel $series sendo usada em conjunto com a chave 'series'
    }

    public function create(){
      return view('series.create');
    }

    public function store(
      SeriesFormRequest $request,
      CriadorDeSerie $criadorDeSerie
    ){
      /*$nome = $request->get('nome'); // pega os dados enviados pelo post do formulario
      var_dump(Serie::create([
        'nome' => $nome
      ]));*/
      $request->validate([]);

      $serie = $criadorDeSerie->criarSerie(
        $request->nome,
        $request->qtd_temporadas,
        $request->ep_por_temporada
      );

      $request->session()->
        flash( // ao contrario do 'put', o 'flash' usa a mensagem apenas uma vez
          'mensagem',
          "serie {$serie->id} e suas temporadas criadas com sucesso: {$serie->nome}"
        );

      // echo "serie {$serie->nome} com id {$serie->id} criada";


      return redirect()->
        route('index'); // retorna um redirecionamento para a pagina principal
    }

    public function destroy(Request $request){
      $serie = Serie::find($request->id);
      $serie->temporadas()->each(function (Temporada $temporada){
        $temporada->episodios()->each(function (Episodio $episodio){
          $episodio->delete();
        });
        $temporada->delete();
      });
      $serie->delete();
      $request->session()->
        flash(
          'mensagem',
          "serie removida com sucesso"
        );

      return redirect()->
        route('index');
    }
  }
 ?>
