@extends('layouts.base')

@section('content')
  <div class="container">
    <div class="row">
      <div class="panel panel-default">
          <div class="panel-heading">Mostrando Usuário <a class="btn btn-xs btn-primary pull-right" href="{{ route('usuarios.index') }}"><i class="glyphicon glyphicon-arrow-left"></i> Voltar</a></div>
          <div class="panel-body">
            @foreach ($oldcards as $card)
              <div class="box box-warning box-solid collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Cartão finalizado dia: </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" type="button" data-widget="collapse">
                      <i class="fa fa-list"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">Body aqui</div>
              </div>
            @endforeach
          </div>

    </div>
  </div>
</div>
@endsection
