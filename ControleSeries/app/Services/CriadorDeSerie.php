<?php
namespace App\Services;

use App\Serie;
use App\Temporada;
use App\Episodio;

  class CriadorDeSerie{
    public function criarSerie(
      string $nomeSerie,
      int $qtdTemporadas,
      int $epPorTemporada
    ){
      $serie = Serie::create(['nome' => $nomeSerie]);

      for($i = 1; $i <= $qtdTemporadas; $i++){
        $temporada =  $serie->temporadas() // chama o metodo 'temporadas', pra enviar dados pra a propriedade
          ->create(['numero' => $i]);//cria uma temporada pre-relacionada com a serie
        for ($j=1; $j <= $epPorTemporada; $j++) {
          $temporada->episodios()->create(['numero' => $j]);
        }
      }
      return $serie;
    }
  }
 ?>
