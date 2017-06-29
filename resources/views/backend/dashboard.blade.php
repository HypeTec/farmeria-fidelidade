
@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="#">
                    <span class="info-box-icon bg-aqua"><i class="ion fa fa-credit-card-alt"></i></span>
                </a>

                <div class="info-box-content">
                    <span class="info-box-text">Quantidade de pontos cadastrados</span>
                    <span class="info-box-number">{{ count(\App\Point::all()) }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="#">
                    <span class="info-box-icon bg-aqua"><i class="ion fa fa-credit-card-alt"></i></span>
                </a>

                <div class="info-box-content">
                    <span class="info-box-text">Quantidade de cartões fechados</span>
                    <span class="info-box-number">{{ count(\App\Card::where('full', true)->get()) }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
