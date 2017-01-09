<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $htmlTitle }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('assets/backend/css/all.css') }}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('extra_styles')
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
    <header class="main-header">
        <a href="{{ route('backend') }}" class="logo">
            <span class="logo-mini"><b>F</b>F</span>
            <span class="logo-lg"><b>Farmeria</b> fidelidade</span>
        </a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </nav>
    </header>
    @include('backend.partials.main-sidebar')
    <div class="content-wrapper">
        @include('backend.partials.system-alerts')
        @include('backend.partials.content-header')
        <section class="content">
            @yield('content')
        </section>
    </div>
    @include('backend.partials.footer')
</div>
@yield('extra_modals')
<script src="{{ asset('assets/backend/js/all.js') }}"></script>
@yield('extra_scripts')
</body>
</html>
