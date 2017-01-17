@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Adicionar pontos no cartão</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('cartao.assinarponto') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="usuario">Usuário</label>
                                <select class="form-control select2" id="usuario" name="usuario_id" required></select>
                            </div>
                            <div class="form-group">
                                <label for="cupomfiscal">Cupom fiscal</label>
                                <input type="text" class="form-control" name="cupomfiscal" id="cupomfiscal" placeholder="Cupom fiscal" value="{{ old('cupomfiscal') }}">
                            </div>
                            <div class="form-group">
                                <label for="operador">Operador</label>
                                <select class="form-control select2" id="operador" name="operador_id" required></select>
                            </div>
                            <div class="form-group">
                                <label for="data_compra">Data de compra</label>
                                <input type="text" class="form-control datepicker" name="data_compra" id="data_compra" value="{{ old('data_compra') }}">
                            </div>
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
  $("#operador").select2({
    placeholder: 'Selecione um operador',
    ajax: {
      url: "{{ route('operadores.select') }}",
      dataType: "json",
      delay: 250,
      data: function (params) {
        return {
        q: params.term,
        page: params.page
      };
    },
  width: "100%"
}
});
});
</script>
@endpush
