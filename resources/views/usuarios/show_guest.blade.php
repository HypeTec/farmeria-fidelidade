@extends('layouts.base_guest')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
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
                                <th>Email</th>
                                <td>{{ $item->email }}</td>
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
                                <th>Cartão fidelidade</th>
                                <td>@include('backend.partials.loyaltycardguest')</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
