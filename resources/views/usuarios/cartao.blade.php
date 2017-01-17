@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Adicionar pontos no cartão</div>
                    <div class="panel-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="usuario">Usuário</label>
                                <select class="form-control select2" id="usuario" name="usuario_id" required>
                                  @foreach ($usuarios as $u)
                                      <option value="$u->id">{{$u->nome}} ({{$u->cpf}})</option>
                                  @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('extra_scripts')
$(function() {
  $usuario.select2({
    placeholder: 'Selecione uma opção',
    width: 100%;
  });
});
  <!-- $(function () {
    $("#usuario").select2({
      placeholder: 'Selecione uma opção',
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
      width: 100%
    });
  }); -->
@endpush
