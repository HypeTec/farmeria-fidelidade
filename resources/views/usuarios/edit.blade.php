@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Usuario</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('usuarios.update', $item->id) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PATCH">
                            {{ csrf_field() }}
							<div class="form-group">
								<label for="nome">Nome</label>
								<input type="text" name="nome" value="{{ $item->nome }}" class="form-control" id="nome" placeholder="nome">
							</div>
							<div class="form-group">
								<label for="pin">Pin</label>
								<input type="text" name="pin" value="{{ $item->pin }}" class="form-control" id="pin" placeholder="pin">
							</div>
							<div class="form-group">
								<label for="sexo">Sexo</label>
								<input type="text" name="sexo" value="{{ $item->sexo }}" class="form-control" id="sexo" placeholder="sexo">
							</div>
							<div class="form-group">
								<label for="data_nascimento">Data_nascimento</label>
								<input type="text" name="data_nascimento" value="{{ $item->data_nascimento }}" class="form-control" id="data_nascimento" placeholder="data_nascimento">
							</div>
							<div class="form-group">
								<label for="cpf">Cpf</label>
								<input type="text" name="cpf" value="{{ $item->cpf }}" class="form-control" id="cpf" placeholder="cpf">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" value="{{ $item->email }}" class="form-control" id="email" placeholder="email">
							</div>
							<div class="form-group">
								<label for="celular">Celular</label>
								<input type="text" name="celular" value="{{ $item->celular }}" class="form-control" id="celular" placeholder="celular">
							</div>
							<div class="form-group">
								<label for="fixo">Fixo</label>
								<input type="text" name="fixo" value="{{ $item->fixo }}" class="form-control" id="fixo" placeholder="fixo">
							</div>
                            <button type="submit" class="btn btn-default">Editar</button>
                            <a href="{{ route('usuarios.index') }}" class="btn btn-danger pull-right">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
