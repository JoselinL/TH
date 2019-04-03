@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page" style="background:chone.jpg">
    <h6 style="margin: -10px">.</h6>
<img style="width: 100%; position:absolute; z-index:0; padding: 0px; filter: blur(4px);" src="chone.jpg">
    <div id="app">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}"><b>Talento</b>Humano</a>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        <div class="login-box-body" style="position:absolute; z-index:0; opacity: 0.8; width: 350px">
        <p class="login-box-msg" style="padding: 0.1px; margin: 0.1px;"> <center> <h3><b>Talento Humano </b></h3></center></p>
        <form action="{{ url('/login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>


            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
                </div><!-- /.col -->
            </div>

            <div class="row">
            <div class="col-xs-12">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Recordar contraseña
                        </label>
                    </div>
                </div>
            </div>
            
        </form>

        @include('adminlte::auth.partials.social_login')

        

        <!--------------------------------------------------------------------------------------------->
        <!--
        <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>
        -->
        <!--------------------------------------------------------------------------------------------->
    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </div>

    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
