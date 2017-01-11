@extends('layouts.base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Mostrando Loja <a class="btn btn-xs btn-primary pull-right" href="{{ route('lojas.index') }}"><i class="glyphicon glyphicon-arrow-left"></i> Voltar</a></div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <tr>
              <th>#</th>
              <td>{{ $item->id }}</td>
            </tr>
            <tr>
              <th>Nome da Loja</th>
              <td>{{ $item->nome }}</td>
            </tr>
            <tr>
              <th>Nome de usuário</th>
              <td>{{ $item->username }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
