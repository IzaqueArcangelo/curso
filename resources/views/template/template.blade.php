<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Tema Bootstrap Admin v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- styles -->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    @stack('estilos')
</head>
<body>
@include('template.navegacao')
<div class="page-content">
    <div class="row">
        {{--menu--}}
        @include('template.menu')
        {{--Conteúdo--}}
        @yield('conteudo')

    </div>
</div>

@include('template.footer')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{--<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>--}}
<script src="https://code.jquery.com/jquery.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- bootstrap-datetimepicker -->
<script src="{{asset('vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

@stack('scripts')
</body>
</html>