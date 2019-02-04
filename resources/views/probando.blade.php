@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Register
@endsection


@section('main-content')

  <div class="container-fluid spark-screen">
    <div class="row">
        <div class="">
          <div id="app">
              <div class="">
                <!--   <div class="register-logo">
                      <a href="{{ url('/home') }}"><b>Help</b>Desk</a>
                  </div> -->

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

                  <div class="register-box-body"  >
                      <p class="login-box-msg">Registre un nuevo Usuario</p>
                      <form action="{{ url('/register') }}" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control" placeholder="Nombres" name="name" value="{{ old('name') }}"/>
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                      <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}"/>
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control" placeholder="Cédula" name="cedula" value="{{ old('cedula') }}"/>
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                           <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control" placeholder="Celular" name="celular" value="{{ old('celular') }}"/>
                                      <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                  </div>
                                 
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                    <select class="form-control" id="sexo" name="sexo" >
                                        <option disabled selected>Sexo</option>
                                        <option>Femenino</option>
                                        <option>Masculino</option>
                                        <option>Indefinido</option>
                                     </select>
                                      <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <select class="form-control" id="estado" name="estado" >
                                        <option disabled selected>Estado</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                      </select>
                                          
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <select class="form-control" id="idtipousuario" name="idtipousuario" >
                                        <option disabled selected>Tipo Usuario</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                      </select>            
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <select class="form-control" id="idextratecnico" name="idextratecnico" >
                                        <option disabled selected>Extra Técnico</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                      </select>        
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <select class="form-control" id="idarea" name="idarea" >
                                        <option disabled selected>Área</option>
                                        <option>1</option> 
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                      </select>      
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                          </div>
                          
                          <div class="row">
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email" value="{{ old('email') }}"/>
                                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                  </div>
                               </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                               </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.retrypepassword') }}" name="password_confirmation"/>
                                      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                        
                      <div class="row">
                            <div class="col-md-3">
                                <label class="lcontainer" style="color: blue; font-size: 14px">Aceptar Terminos y Condiciones
                                       <input type="checkbox" name="terms">
                                      <span class="lcheckmark"></span>
                                </label>
                            </div><!-- /.col -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">Ver </button>
                                </div>
                            </div><!-- /.col -->
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.register') }}</button>
                            </div><!-- /.col -->
                    </div>
                      </form>

                      @include('adminlte::auth.partials.social_login')

                      <!-- <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a> -->
                  </div><!-- /.form-box -->
              </div><!-- /.register-box -->
          </div>

          @include('adminlte::auth.terms')

          <script>
              $(function () {
                  $('input').iCheck({
                      checkboxClass: 'icheckbox_square-blue',
                      radioClass: 'iradio_square-blue',
                      increaseArea: '20%' // optional
                  });
              });
          </script>
        </div>
    </div>
@endsection
