<?php
  namespace App\Services;
  use App\{Serie, Episodio, Temporada};

  class RemovedorDeSerie{
    public function removeSerie(
      int $idSerie
    ){
      $serie = Serie::find($idSerie);
      $nomeSerie = $serie->nome;
      $serie->temporadas()->each(function (Temporada $temporada){
        $temporada->episodios()->each(function (Episodio $episodio){
          $episodio->delete();
        });
        $temporada->delete();
      });
      $serie->delete();
      return $nomeSerie;
    }
  }
 ?>
