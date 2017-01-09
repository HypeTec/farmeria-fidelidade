@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Criar novo Usuario</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
							<div class="form-group">
								<label for="nome">Nome</label>
								<input type="text" name="nome" class="form-control" id="nome" placeholder="nome" value="{{ old('nome') }}">
							</div>
							<div class="form-group">
								<label for="pin">Pin</label>
								<input type="text" name="pin" class="form-control" id="pin" placeholder="pin" value="{{ old('pin') }}">
							</div>
							<div class="form-group">
								<label for="sexo">Sexo</label>
								<input type="text" name="sexo" class="form-control" id="sexo" placeholder="sexo" value="{{ old('sexo') }}">
							</div>
							<div class="form-group">
								<label for="data_nascimento">Data_nascimento</label>
								<input type="text" name="data_nascimento" class="form-control" id="data_nascimento" placeholder="data_nascimento" value="{{ old('data_nascimento') }}">
							</div>
							<div class="form-group">
								<label for="cpf">Cpf</label>
								<input type="text" name="cpf" class="form-control" id="cpf" placeholder="cpf" value="{{ old('cpf') }}">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" class="form-control" id="email" placeholder="email" value="{{ old('email') }}">
							</div>
							<div class="form-group">
								<label for="celular">Celular</label>
								<input type="text" name="celular" class="form-control" id="celular" placeholder="celular" value="{{ old('celular') }}">
							</div>
							<div class="form-group">
								<label for="fixo">Fixo</label>
								<input type="text" name="fixo" class="form-control" id="fixo" placeholder="fixo" value="{{ old('fixo') }}">
							</div>
                            <button type="submit" class="btn btn-default">Criar</button>
                            <a href="{{ route('usuarios.index') }}" class="btn btn-danger pull-right">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
