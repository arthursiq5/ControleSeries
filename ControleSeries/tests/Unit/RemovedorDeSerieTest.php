<?php

namespace Tests\Unit;

use App\Services\{RemovedorDeSerie, CriadorDeSerie};
use App\{Serie, Episodio, Temporada};
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{
  use RefreshDatabase;
  private $serie;
  public function setUp(): void{
    $criador = new CriadorDeSerie();
    $this->serie = $criador->criarSerie(
      'SerieTeste',
      1,
      1
    );

  }
  public function testRemoverSerie()
  {
    $this->assertDatabaseHas('series', [
      'id' => $this->serie->id
    ]);
    $removedor = new RemovedorDeSerie();
    $nomeSerie = $removedor->removeSerie($this->serie->id);
    $this->assertIsString();
    $this->assertEquals('SerieTeste', $nomeSerie);
    $this->assertDatabaseMissing(
      'series', [
        'id' => $this->serie->id
      ]);
  }
}
