<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public function temporada(){ // mostra a temporada relacionada com o episodio
      return $this->belongsTo(Temporada::class);
    }
}
