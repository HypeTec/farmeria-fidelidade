@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Criar novo Operador</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('operadors.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
							<div class="form-group">
								<label for="name">Nome</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{ old('name') }}">
							</div>
							<div class="form-group">
								<label for="username">Nome de usuário</label>
								<input type="text" name="username" class="form-control" id="username" placeholder="username" value="{{ old('username') }}">
							</div>
							<div class="form-group">
								<label for="password">Senha</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="password">
							</div>
                            <div class="form-group">
                                <select name="loja_id">
                                    <option value="" selected>Selecione uma loja</option>
                                    @foreach ($lojas as $l)
                                        <option value="{{$l->id}}">{{$l->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-default">Criar</button>
                            <a href="{{ route('operadors.index') }}" class="btn btn-danger pull-right">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
