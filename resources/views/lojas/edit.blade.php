@extends('layouts.base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Editar Loja</div>
        <div class="panel-body">
          <form method="POST" action="{{ route('lojas.update', $item->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nome">Nome da loja</label>
              <input type="text" name="nome" value="{{ $item->nome }}" class="form-control" id="nome" placeholder="Nome da loja">
            </div>
            <div class="form-group">
              <label for="username">Nome de usuário</label>
              <input type="text" name="username" value="{{ $item->username }}" class="form-control" id="username" placeholder="Nome de usuário">
            </div>
            <div class="form-group">
              <label for="password">Nova senha</label>
              <input type="password" name="password"  class="form-control" id="password" placeholder="Nova senha">
            </div>
            <button type="submit" class="btn btn-default">Editar</button>
            <a href="{{ route('lojas.index') }}" class="btn btn-danger pull-right">Cancelar</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
