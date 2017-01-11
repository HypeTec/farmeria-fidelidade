@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Operadors <a class="btn btn-xs btn-primary pull-right" href="{{ route('operadors.create') }}"><i class="glyphicon glyphicon-plus"></i> adicionar Operador</a></div>
                <div class="panel-body">
                    @if($list->count())
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
									<th>Name</th>
									<th>Username</th>
									<th>Nome da loja</th>

                                    <th class="text-right">Opções</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>

										<td>{{ $item->name }}</td>
										<td>{{ $item->username }}</td>
										<td>{{ $item->loja->nome}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-xs btn-primary" href="{{ route('operadors.show', $item->id) }}"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                                            <a class="btn btn-xs btn-warning" href="{{ route('operadors.edit', $item->id) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                                            <form action="{{ route('operadors.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar?')) { return true } else {return false };">
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
