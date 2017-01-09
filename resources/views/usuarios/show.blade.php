@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mostrando Usuario <a class="btn btn-xs btn-primary pull-right" href="{{ route('usuarios.index') }}"><i class="glyphicon glyphicon-arrow-left"></i> Voltar</a></div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>#</th>
                                <td>{{ $item->id }}</td>
                            </tr>
							<tr>
								<th>Nome</th>
								<td>{{ $item->nome }}</td>
							</tr>
							<tr>
								<th>Pin</th>
								<td>{{ $item->pin }}</td>
							</tr>
							<tr>
								<th>Sexo</th>
								<td>{{ $item->sexo }}</td>
							</tr>
							<tr>
								<th>Data_nascimento</th>
								<td>{{ $item->data_nascimento }}</td>
							</tr>
							<tr>
								<th>Cpf</th>
								<td>{{ $item->cpf }}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>{{ $item->email }}</td>
							</tr>
							<tr>
								<th>Celular</th>
								<td>{{ $item->celular }}</td>
							</tr>
							<tr>
								<th>Fixo</th>
								<td>{{ $item->fixo }}</td>
							</tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
