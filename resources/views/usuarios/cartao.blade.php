@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Adicionar pontos no cartão</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('cartao.assinarponto') }}" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="usuario">Usuário</label>
                                <select class="form-control select2" id="usuario" name="usuario_id" required>
                                  @if (isset($usuario))
                                  <option value="{{$usuario->id}}">{{$usuario->nome}} {{($usuario->cpf)}}</option>
                                  @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cupomfiscal">Cupom fiscal</label>
                                <input type="text" class="form-control" name="cupomfiscal" id="cupomfiscal" value="{{ old('cupomfiscal') }}">
                            <div class="form-group">
                                <label for="data_compra">Data de compra</label>
                                <input type="text" class="form-control datepicker" name="data_compra" id="data_compra" value="{{ old('data_compra') }}">
                            </div>
                            <div class="form-group">
                                <label for="operador_username">Nome de usuário do operador</label>
                                <input type="text" class="form-control" name="operador_username" id="operador_username" value="{{ old('operador_username') }}">
                            </div>

                            <div class="form-group">
                                <label for="operador_username">Senha do operador</label>
                                <input type="password" class="form-control" name="operador_password" id="operador_password">
                            </div>

                            <button type="submit" class="btn btn-primary">Adicionar ponto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('extra_scripts')
<script>
$(function () {
  $(".datepicker").datepicker();
  $(".datepicker").datepicker("option", "dateFormat", "dd/mm/yy");
  $(".datepicker").mask('00/00/0000');

  $("#usuario").select2({
    placeholder: 'Selecione um usuário',
    ajax: {
      url: "{{ route('usuarios.select') }}",
      dataType: "json",
      delay: 250,
      data: function (params) {
        return {
          q: params.term,
          page: params.page
        };
      }
    },
    width: "100%"
  });

});
</script>
@endpush
