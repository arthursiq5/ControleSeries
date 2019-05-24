@extends('layout') <!-- extende o layout do projeto -->

@section('cabecalho')
Series
@endsection

@section('conteudo')
    @if(!empty($mensagem))
    <div class="alert alert-success">
      {{$mensagem}}
    </div>
    @endif

    <a href="{{route('adiciona_serie')}}" class='btn btn-dark mb-2'>Adicionar</a>

    <ul class='list-group'>
    @foreach ($series as $serie)
    <li class='list-group-item d-flex justify-content-between align-items-center'>
      {{ $serie->nome }}
      <form method="post" action="/series/{{ $serie->id}}"
        onsubmit="return confirm('Tem certeza que deseja remover {{addslashes($serie->nome)}}?')">
        @csrf
        @method('DELETE') <!-- como o metodo 'delete' nao e suportado pelo HTML, ele deve ser setado atraves do proprio 'Laravel' -->
        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Excluir</button>
      </form>
    </li>
    @endforeach
</ul>
@endsection
