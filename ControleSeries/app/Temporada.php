<?php

namespace App;

use Illuminate\Database\Eloquent\{Model, Collection};

class Temporada extends Model
{
  protected $fillable = ['numero'];
  public $timestamps = false;

  public function episodios(){ // faz mencao a todos os objetos que implementam 'Episodio' que possuam relacao com a temporada
    return $this->hasMany(Episodio::class);
  }

  public function serie(){ // mostra a serie relacionada com a temporada
    return $this->belongsTo(Serie::class);
  }

  public function getEpisodiosAssistidos() : Collection
  {
    return $this->episodios->filter( // retorna uma collection filtrada para conter apenas certos dados
      function(Episodio $episodio){
        return $episodio->assistido; // retorna apenas os episodios assistidos
      }
    );
  }
}
