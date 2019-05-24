@extends('layout') <!-- extende o layout do projeto -->

@section('cabecalho')
Series
@endsection

@section('conteudo')
    <div class="alert alert-success">
      {{$mensagem}}
    </div>
    
    <a href="/series/criar" class='btn btn-dark mb-2'>Adicionar</a>

    <ul class='list-group'>
    @foreach ($series as $serie)
    <li class='list-group-item'>{{ $serie->nome }}</li>
    @endforeach
</ul>
@endsection
