@extends('layouts.base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Mostrando Operador <a class="btn btn-xs btn-primary pull-right" href="{{ route('operadores.index') }}"><i class="glyphicon glyphicon-arrow-left"></i> Voltar</a></div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <tr>
              <th>#</th>
              <td>{{ $item->id }}</td>
            </tr>
            <tr>
              <th>Nome do operador</th>
              <td>{{ $item->name }}</td>
            </tr>
            <tr>
              <th>Nome de usuário</th>
              <td>{{ $item->username }}</td>
            </tr>
            <tr>
              <th>Nome da loja</th>
              <td>{{ $item->loja->nome }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
