<?php

namespace Tests\Unit;

use app\{Episodio, Serie, Temporada};
use App\Services\CriadorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{
    /**
     * @return void
     */
    public function testCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeSerie = 'Nome de Teste';
        $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas(
          'series',
          [
            'nome' => $nomeSerie // garante que a serie foi criada
          ]
        );
        $this->assertDatabaseHas(
          'temporadas',
          [
            'serie_id' => $serieCriada->id, // garante que ha uma temporada nessa serie
            'numero' => 1, // garante que ha ao menos uma temporada nessa serie
          ]
        );
        $this->assertDatabaseHas(
          'episodios',
          [
            'numero' => 1,
          ]
        );
    }
}
