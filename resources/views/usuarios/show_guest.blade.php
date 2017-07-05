@extends('layouts.base_guest')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-bordered table-striped ">

                            <tr>
                                <th>Nome</th>
                                <td>{{ $item->nome }}</td>
                            </tr>
                            <tr>
                                <th>Sexo</th>
                                <td>{{ $item->sexo }}</td>
                            </tr>
                            <tr>
                                <th>Data de nascimento</th>
                                <td>@if (isset($item->data_nascimento)) {{ $item->data_nascimento->format('d/m/Y') }} @endif</td>
                            </tr>
                            <tr>
                                <th>CPF</th>
                                <td>{{ $item->cpf }}</td>
                            </tr>
                            <tr>
                                <th>Celular</th>
                                <td>{{ $item->celular }}</td>
                            </tr>
                            <tr>
                                <th>Fixo</th>
                                <td>{{ $item->fixo }}</td>
                            </tr>
                            <tr>
                                <div class="text-center">
                                    <strong>Cartão fidelidade</strong>
                                    <h4>Você tem:</h4>
                                    <img class="img-responsive center-block" src="/assets/images/pontos_{{$item->card()->first()->pontos->count()}}.png">
                                </div>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
