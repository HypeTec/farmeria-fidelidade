@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mostrando Operador <a class="btn btn-xs btn-primary pull-right" href="{{ route('operadors.index') }}"><i class="glyphicon glyphicon-arrow-left"></i> Voltar</a></div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>#</th>
                                <td>{{ $item->id }}</td>
                            </tr>
							<tr>
								<th>Name</th>
								<td>{{ $item->name }}</td>
							</tr>
							<tr>
								<th>Username</th>
								<td>{{ $item->username }}</td>
							</tr>
							<tr>
								<th>Password</th>
								<td>{{ $item->password }}</td>
							</tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection