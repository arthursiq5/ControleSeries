<?php

namespace Tests\Unit;

use App\{Temporada, Episodio};
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TemporadaTest extends TestCase
{
  use RefreshDatabase;
  /** @var Temporada */
  private $temporada;

  protected function setUp(): void{
    parent::setUp();
    $temporada = new Temporada();
    $ep1 = new Episodio();
    $ep1->assistido = true;
    $ep2 = new Episodio();
    $ep2->assistido = false;
    $ep3 = new Episodio();
    $ep3->assistido = true;

    $temporada->episodios->add($ep1);
    $temporada->episodios->add($ep2);
    $temporada->episodios->add($ep3);

    $this->temporada = $temporada;
  }

  public function testBuscaPorEpisodiosAssistidos()
  {
    $episodiosassistidos =  $this
      ->temporada->getEpisodiosAssistidos();

    $this->assertCount((2), $episodiosassistidos);
    foreach ($episodiosassistidos as $episodio) {
      $this->assertTrue($episodio->assistido);
    }
  }
  public function testBuscaTodosEpisodios(){
    $episodios = $this->temporada->episodios;
    $this->assertCount(3, $episodios);
  }
}
