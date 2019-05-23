@extends('layout')
@section('cabecalho')
Adicionar Serie
@endsection

@section('conteudo')
<form class="" method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id='nome' class='form-control'/>
    </div>

    <button type="button" class='btn btn-primary'>Adicionar</button>
</form>
@endsection
