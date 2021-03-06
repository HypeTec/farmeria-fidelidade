@extends('layouts.base')

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                Usuários
                <a class="btn btn-xs btn-primary pull-right" href="{{ route('usuarios.create') }}"><i class="glyphicon glyphicon-plus"></i> Adicionar Usuário</a>
            </div>
            <div class="box-body">
                @if($list->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Pin</th>
                                <th>Sexo</th>
                                <th>Data de nascimento</th>
                                <th>CPF</th>
                                <th>Email</th>
                                <th>Celular</th>
                                <th>Fixo</th>
                                <th class="text-right">Opções</th>
                            </tr>
                            <tr>
                                <form action="{{ route('usuarios.index') }}" method="GET">
                                    <input type="text" name="filterSearch" placeholder="Insira a busca aqui">
                                    <button type="submit" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-search"></i> Buscar usuário</button>
                                </form>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>

										<td>{{ $item->nome }}</td>
										<td>{{ $item->pin }}</td>
										<td>{{ $item->sexo }}</td>
										<td>@if (isset($item->data_nascimento)) {{ $item->data_nascimento->format('d/m/Y') }} @endif</td>
										<td>{{ $item->cpf }}</td>
										<td>{{ $item->email }}</td>
										<td>{{ $item->celular }}</td>
										<td>{{ $item->fixo }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-xs btn-primary" href="{{ route('usuarios.show', $item->id) }}"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                                            <a class="btn btn-xs btn-warning" href="{{ route('usuarios.edit', $item->id) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                                            <form action="{{ route('usuarios.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar?')) { return true } else {return false }">
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
