<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Temporada, Episodio, Serie};

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada){
      $episodios = $temporada->episodios;
      $temporadaId = $temporada->id;
      return view(
        'episodios.index',
        compact(
          'episodios',
          'temporadaId'
          )
      );
    }

    public function assistir(
      Temporada $temporada,
      Request $request
    ){
      $episodiosAssistidos = $request->episodios;
      $temporada->episodios->each(
        function(Episodio $episodio) use ($episodiosAssistidos){ // recebe um objeto 'Episodio' da temporada em questao e um array 'episodiosAssistidos' contendo todos os episodios assistidos da serie em questao
          $episodio->assistido = !is_null($episodiosAssistidos)
            ? (in_array( // se o episodio estiver dentro do array 'assistidos', transforme seu valor em 'true'
              $episodio->id,
              $episodiosAssistidos
              ))
              : false;
      });
      $temporada->push(); // obriga o campo 'temporada' a atualizar os dados do banco

      return redirect()->back();
    }
}
