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
    parent::setUp();
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
    $nomeSerie = $removedor->removeSerie( // remove a serie
      $this->serie->id
    );

    $this->assertIsString($nomeSerie); // verifica se o metodo que deleta serie retornou uma string

    $this->assertEquals('SerieTeste', $nomeSerie); // verifica se nao ha distorcao de dados
    $this->assertDatabaseMissing( // verifica se a serie foi realmente excluida
      'series', [
        'id' => $this->serie->id
      ]);
  }
}
