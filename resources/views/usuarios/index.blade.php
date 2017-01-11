@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Usuarios <a class="btn btn-xs btn-primary pull-right" href="{{ route('usuarios.create') }}"><i class="glyphicon glyphicon-plus"></i> adicionar Usuario</a></div>
                <div class="panel-body">
                    @if($list->count())
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
									<th>Nome</th>
									<th>Pin</th>
									<th>Sexo</th>
									<th>Data_nascimento</th>
									<th>Cpf</th>
									<th>Email</th>
									<th>Celular</th>
									<th>Fixo</th>

                                    <th class="text-right">Opções</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>

										<td>{{ $item->nome }}</td>
										<td>{{ $item->pin }}</td>
										<td>{{ $item->sexo }}</td>
										<td>{{ $item->data_nascimento }}</td>
										<td>{{ $item->cpf }}</td>
										<td>{{ $item->email }}</td>
										<td>{{ $item->celular }}</td>
										<td>{{ $item->fixo }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-xs btn-primary" href="{{ route('usuarios.show', $item->id) }}"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                                            <a class="btn btn-xs btn-warning" href="{{ route('usuarios.edit', $item->id) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                                            <form action="{{ route('usuarios.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar?')) { return true } else {return false };">
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
