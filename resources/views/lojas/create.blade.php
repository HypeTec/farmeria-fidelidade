@extends('layouts.base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Criar nova Loja</div>
        <div class="panel-body">
          <form method="POST" action="{{ route('lojas.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nome">Nome da loja</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Nome da loja" value="{{ old('name') }}">
            </div>
            <div class="form-group">
              <label for="username">Nome de usuário</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Nome de usuário" value="{{ old('username') }}">
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Senha">
            </div>
            <button type="submit" class="btn btn-default">Criar</button>
            <a href="{{ route('lojas.index') }}" class="btn btn-danger pull-right">Cancelar</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
