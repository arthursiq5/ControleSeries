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
      <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

      <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
        <input type="text" class="form-control" value="{{ $serie->nome }}">
        <div class="input-group-append">
          <button class="btn btn-primary mr-1" onclick="editarSerie({{ $serie->id }})">
            <i class="fas fa-check"></i>
          </button>
          @csrf
        </div>
      </div>
      <span class='d-flex'> <!-- agrupa os botoes -->
        <button class='btn btn-info btn-sm mr-1' onclick='toggleInput({{$serie->id}})'>
          <i class='fas fa-edit'></i>
        </button>
        <a class='btn btn-info btn-sm mr-1' href="/series/{{ $serie->id }}/temporadas">
          <i class="fas fa-external-link-alt"></i>
        </a>

        <form method="post" action="/series/{{ $serie->id}}"
          onsubmit="return confirm('Tem certeza que deseja remover {{addslashes($serie->nome)}}?')">
          @csrf
          @method('DELETE') <!-- como o metodo 'delete' nao e suportado pelo HTML, ele deve ser setado atraves do proprio 'Laravel' -->
          <button class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash-alt"></i> Excluir</button>
        </form>
      </span>
    </li>
    @endforeach
</ul>

<script type="text/javascript">
  function toggleInput(serieId){
    const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
    const nomeSerieInput = document.getElementById(`input-nome-serie-${serieId}`);
    if (nomeSerieEl.hasAttribute('hidden')){
      nomeSerieEl.removeAttribute('hidden');
      nomeSerieInput.hidden = true;
    }else{
      nomeSerieInput.removeAttribute('hidden');
      nomeSerieEl.hidden = true;
    }
  }
</script>
@endsection
