@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Operador</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('operadors.update', $item->id) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PATCH">
                            {{ csrf_field() }}
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" value="{{ $item->name }}" class="form-control" id="name" placeholder="name">
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" value="{{ $item->username }}" class="form-control" id="username" placeholder="username">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="text" name="password" value="{{ $item->password }}" class="form-control" id="password" placeholder="password">
							</div>
                            <button type="submit" class="btn btn-default">Editar</button>
                            <a href="{{ route('operadors.index') }}" class="btn btn-danger pull-right">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
