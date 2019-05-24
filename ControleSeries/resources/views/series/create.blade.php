@extends('layout')
@section('cabecalho')
Adicionar Serie
@endsection

@section('conteudo')
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    </div>
@endif
<form method="post">
  @csrf <!-- faz o trabalho de envio e recebimento do token de seguranca -->
  <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" name="nome" id='nome' class='form-control'/>
  </div>

    <button class='btn btn-primary'>Adicionar</button>
</form>
@endsection
