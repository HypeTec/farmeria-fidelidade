@extends('layouts.base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Criar novo Usuario</div>
        <div class="panel-body">
          <form method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" value="{{ old('nome') }}">
            </div>
            <div class="form-group">
              <label for="pin">Pin</label>
              <input type="text" name="pin" class="form-control" id="pin" placeholder="PIN" value="{{ old('pin') }}">
            </div>
            <div class="form-group">
              <label for="sexo">Sexo</label> <br />
              <select name="sexo">
                <option id="masculino" value="Masculino" @if ( old('sexo') == 'Masculino') selected @endif >Masculino</option>
                <option id="feminino" value="Feminino" @if (old('sexo') == 'Feminino') selected @endif >Feminino</option>
                <option></option>
              </select>
            </div>
              <label for="data_nascimento">Data de nascimento</label>
              <input type="text" name="data_nascimento" class="form-control date" id="data_nascimento" placeholder="Data de nascimento" value="{{ old('data_nascimento') }}">
              <div class="form-group">
            </div>
            <div class="form-group">
              <label for="cpf">CPF</label>
              <input type="text" name="cpf" class="form-control cpf" id="cpf" placeholder="CPF" value="{{ old('cpf') }}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
              <label for="celular">Celular</label>
              <input type="text" name="celular" class="form-control phone" id="celular" placeholder="Celular" value="{{ old('celular') }}">
            </div>
            <div class="form-group">
              <label for="fixo">Fixo</label>
              <input type="text" name="fixo" class="form-control fixo" id="fixo" placeholder="Celular" value="{{ old('fixo') }}">
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
@push('extra_scripts')
<script>
$(document).ready(function (){

  $('.date').mask('00/00/0000');
  $('.cpf').mask('000.000.000-00');
  $('.phone').mask('(00) 00000-0000');
  $('.fixo').mask('(00) 0000-0000');
})
</script>
@endpush
