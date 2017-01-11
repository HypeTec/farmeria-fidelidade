@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Usuario</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('usuarios.update', $item->id) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PATCH">
                            {{ csrf_field() }}
							<div class="form-group">
								<label for="nome">Nome</label>
								<input type="text" name="nome" value="{{ $item->nome }}" class="form-control" id="nome" placeholder="Nome">
							</div>
							<div class="form-group">
								<label for="pin">PIN</label>
								<input type="text" name="pin" value="{{ $item->pin }}" class="form-control" id="pin" placeholder="PIN">
							</div>
              <div class="form-group">
                <label for="sexo">Sexo</label> <br />
                <select name="sexo">
                  <option id="masculino" value="Masculino" @if ($item->sexo == 'Masculino') selected @endif >Masculino</option>
                  <option id="feminino" value="Feminino" @if ($item->sexo == 'Feminino') selected @endif >Feminino</option>
                </select>
              </div>
							<div class="form-group">
								<label for="data_nascimento">Data de nascimento</label>
								<input type="text" name="data_nascimento" value="{{ $item->data_nascimento }}" class="form-control date" id="data_nascimento" placeholder="Data de nascimento">
							</div>
							<div class="form-group">
								<label for="cpf">CPF</label>
								<input type="text" name="cpf" value="{{ $item->cpf }}" class="form-control cpf" id="cpf" placeholder="CPF">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" value="{{ $item->email }}" class="form-control" id="email" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="celular">Celular</label>
								<input type="text" name="celular" value="{{ $item->celular }}" class="form-control phone" id="celular" placeholder="Celular">
							</div>
							<div class="form-group">
								<label for="fixo">Fixo</label>
								<input type="text" name="fixo" value="{{ $item->fixo }}" class="form-control fixo" id="fixo" placeholder="fixo">
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
@section('extra_scripts')
<script>
$(document).ready(function (){
  $('.date').mask('00/00/0000');
  $('.cpf').mask('000.000.000-00');
  $('.phone').mask('(00) 00000-0000');
  $('.fixo').mask('(00) 0000-0000');
})
</script>
@endsection
