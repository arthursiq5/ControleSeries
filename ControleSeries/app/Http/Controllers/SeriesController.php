<?php
  namespace App\Http\Controllers;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use App\Http\Requests\SeriesFormRequest;
  use App\{Serie, Temporada, Episodio};
  use App\Services\{CriadorDeSerie, RemovedorDeSerie};

  class SeriesController extends Controller{
    public function __construct(){
      $this->middleware('auth'); // antes de qualquer metodo de dentro desse controller ser acessado, ele vai passar pelo 'meio de campo', middleware 'auth'
    }
    public function index(Request $request){
      /*if(!Auth::check()){ // protege a rota individualmente (arquivo por arquivo)
        echo 'nao autenticado';
        exit();
      }*/
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

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie){
      $nomeSerie = $removedorDeSerie->removeSerie($request->id);
      $request->session()->
        flash(
          'mensagem',
          "serie $nomeSerie removida com sucesso"
        );

      return redirect()->
        route('index');
    }

    public function editaNome(int $id, Request $request){
      $novoNome = $request->nome;
      $serie = Serie::find($id);
      $serie->nome = $novoNome;
      $serie->save();
    }
  }
 ?>
