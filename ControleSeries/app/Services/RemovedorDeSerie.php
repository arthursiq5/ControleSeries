<?php
  namespace App\Services;

  use Illuminate\Support\Facades\DB;
  use App\{Serie, Episodio, Temporada};

  class RemovedorDeSerie{
    public function removeSerie(
      int $idSerie
    ):string{ // retorna, obrigatoriamente, uma string
      $nomeSerie = '';
      DB::transaction(function() use  ($idSerie, &$nomeSerie){ // cria uma transaction com uma funcao anonima que recebe como parametro o endereço de memoria de 'nomeSerie'
        $serie = Serie::find($idSerie); // encontra a serie a ser deletada
        $nomeSerie = $serie->nome; // pega o nome da serie deletada

        $this->removerTemporadas($serie);
        $serie->delete(); // remove a serie
      });


      return $nomeSerie; // retorna uma string
    }

    private function removerTemporadas(Serie $serie): void{
      // a partir daqui começam as exclusoes
      $serie->temporadas()->each(function (Temporada $temporada){ // percorre todas as temporadas da serie
        $this->removerEpisodios($temporada);


        $temporada->delete(); // remove cada uma das temporadas de dentro da serie

      });
    }

    private function removerEpisodios(Temporada $temporada): void{
      $temporada->episodios()->each(function (Episodio $episodio){ // percorre todos os episodios da temporada

        $episodio->delete(); // remove cada um dos episodios de dentro da temporada
      });
    }
  }
 ?>
