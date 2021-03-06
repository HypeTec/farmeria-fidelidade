@extends('layouts.base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Lojas <a class="btn btn-xs btn-primary pull-right" href="{{ route('lojas.create') }}"><i class="glyphicon glyphicon-plus"></i> adicionar Loja</a></div>
        <div class="panel-body">
          @if($list->count())
          <table class="table table-condensed table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome da Loja</th>
                <th>Nome de usuário</th>

                <th class="text-right">Opções</th>
              </tr>
            </thead>

            <tbody>
              @foreach($list as $item)
              <tr>
                <td>{{ $item->id }}</td>

                <td>{{ $item->name }}</td>
                <td>{{ $item->username }}</td>
                <td class="text-right">
                  <a class="btn btn-xs btn-primary" href="{{ route('lojas.show', $item->id) }}"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                  <a class="btn btn-xs btn-warning" href="{{ route('lojas.edit', $item->id) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                  <form action="{{ route('lojas.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar?')) { return true } else {return false };">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Deletar</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="text-center">
            {{ $list->appends(Request::all())->links() }}
          </div>
          @else
          <h3 class="text-center alert alert-info">Não há registros</h3>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
