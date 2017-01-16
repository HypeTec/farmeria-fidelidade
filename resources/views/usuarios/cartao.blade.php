@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Adicionar pontos no cartão</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('usuarios.assinarcartao') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <select class="select2">
                                    @foreach ($usuarios as $u)
                                        <option value="{{ $u->id }}">{{ $u->nome }}</option>
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
