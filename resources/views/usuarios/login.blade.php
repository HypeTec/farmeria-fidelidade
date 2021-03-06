<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Farmeria - Cartão Fidelidade | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/all.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <!-- iCheck -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="{{asset('assets/images/logo_farmeria_full_preto.png')}}" class="img-responsive">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        @include('backend.partials.system-alerts')
        <form action="{{ route('usuario.logar') }}" role="form" method="post">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus >
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }} has-feedback">
                <input type="text" class="form-control cpf" placeholder="CPF" id="password" name="cpf" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <!-- /.col -->
            <div class="row">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Logar</button>
            </div>
            <!-- /.col -->

        </form>


        <!-- /.social-auth-links -->

    </div>
    <!-- /.login-box-body -->
    <div class="text-center">
        <h4>Telefone: (84) 3027-1515</h4>
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
@yield('extra_modals')
<script src="{{ asset('assets/backend/js/all.js') }}"></script>
<script>
    $(document).ready(function (){
        $('.cpf').mask('000.000.000-00');
    })
</script>
@yield('extra_scripts')
</body>
</html>
