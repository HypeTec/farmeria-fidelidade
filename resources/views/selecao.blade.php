<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $htmlTitle or ''}}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('assets/backend/css/all.css') }}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('extra_styles')
</head>
<body>
    <div class="text-center">
        <div class="col-md-12">
            <a href="#" class="btn btn-lg btn-primary">Acessar coisa 1</a>
        </div>
        <div class="col-md-12">
            <a href="#" class="btn btn-lg btn-primary">Acessar coisa 2</a>
        </div>
    </div>
</body>
</html>