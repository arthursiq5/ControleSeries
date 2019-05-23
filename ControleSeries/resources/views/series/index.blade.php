@extends('layout') <!-- extende o layout do projeto -->

@section('cabecalho')
Series
@endsection

@section('conteudo')
    <a href="/series/criar" class='btn btn-dark mb-2'>Adicionar</a>

    <ul class='list-group'>
    <?php
      foreach ($series as $serie): // forma diferenciada de fazer um foreach com HTML e PHP bem separados
    ?>
    <li class='list-group-item'><?= $serie?></li>
  <?php endforeach; ?>
</ul>
@endsection
