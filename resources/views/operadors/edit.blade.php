@extends('layouts.base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Editar Operador</div>
        <div class="panel-body">
          <form method="POST" action="{{ route('operadores.update', $item->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name">Nome do operador</label>
              <input type="text" name="name" value="{{ $item->name }}" class="form-control" id="name" placeholder="Nome do operador">
            </div>
            <div class="form-group">
              <label for="username">Nome do usuário</label>
              <input type="text" name="username" value="{{ $item->username }}" class="form-control" id="username" placeholder="username">
            </div>
            <div class="form-group">
              <label for="loja_id">Loja</label> <br />
              <select name="loja_id">

                @foreach ($lojas as $l)
                <option value="{{$l->id}}" @if ($l->id == $item->loja_id) selected @endif>{{$l->nome}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="password">Nova senha</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Nova senha">
            </div>

            <button type="submit" class="btn btn-default">Editar</button>
            <a href="{{ route('operadores.index') }}" class="btn btn-danger pull-right">Cancelar</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
