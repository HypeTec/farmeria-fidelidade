@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Histórico</div>
                    <div class="panel-body">
                    @if($list->count())
                        <table class="table table-condensed table-stripped">
                            <thead>
                                <tr>
                                    <th>Nome do cliente</th>
                                    <th>Operador</th>
                                    <th>Data da compra</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td> {{ $item->card->usuario ? $item->card->usuario->nome : '' }}</td>
                                    <td> {{ $item->operador ? $item->operador->username : ''}}</td>
                                    <td> {{ $item->data_compra->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @else
                        <h3 class="text-center alert alert-info">Não há registros</h3>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection