<?php
  namespace App\Http\Controllers;
  use Illuminate\Http\Request;
  use App\Http\Requests\SeriesFormRequest;
  use App\Serie;

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

    public function store(SeriesFormRequest $request){
      /*$nome = $request->get('nome'); // pega os dados enviados pelo post do formulario
      var_dump(Serie::create([
        'nome' => $nome
      ]));*/
      $request->validate([]);
      $serie = Serie::create(['nome' => $request->nome]);

      $qtdTemporadas = $request->qtd_temporadas;
      for($i = 1; $i <= $qtdTemporadas; $i++){
        $temporada =  $serie->temporadas() // chama o metodo 'temporadas', pra enviar dados pra a propriedade
          ->create(['numero' => $i]);//cria uma temporada pre-relacionada com a serie
          for ($j=1; $j <= $request->ep_por_temporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
          }
        }

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
      Serie::destroy($request->id);
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
