<?php
  namespace App;

  use Illuminate\Database\Eloquent\Model; // ferramenta de conversao de objetos em querys relacionais, e vice-versa
  class Serie extends Model{
    // protected $table = 'series'; // removido por ser referencia ao mesmo item
    public $timestamps = false; // impede o Laravel de enviar o timestamps junto aos dados
    protected $fillable = ['nome'];

    public function temporadas(){ // faz mencao a todos os objetos do tipo 'temporada' que possuam algum tipo de relacao com series
      return $this->hasMany(Temporada::class);
    }


  }
 ?>
