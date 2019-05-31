<?php
namespace App\Services;

use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;

  class CriadorDeSerie{
    public function criarSerie(
      string $nomeSerie,
      int $qtdTemporadas,
      int $epPorTemporada
    ){
      $serie = null;
      DB::beginTransaction();
      $serie = Serie::create(['nome' => $nomeSerie]);
      for($i = 1; $i <= $qtdTemporadas; $i++){
        $this->criarTemporadas($serie, $i, $epPorTemporada);
      }
      DB::commit();
      //DB::rollback();
      return $serie;
    }

    private function criarTemporadas(Serie $serie, $numeroTemporada, $epPorTemporada):void{
      $temporada =  $serie->temporadas() // chama o metodo 'temporadas', pra enviar dados pra a propriedade
        ->create(['numero' => $numeroTemporada]);//cria uma temporada pre-relacionada com a serie

      for ($j=1; $j <= $epPorTemporada; $j++) {
        $temporada->episodios()->create(['numero' => $j]);
      }
    }
  }
 ?>
