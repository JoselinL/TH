@extends('adminlte::layouts.app')

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
                      <p> <h3>Registre un nuevo Dispositivo</h3></p>
                      <hr>
                      <form action="{{ url('/dispositivos') }}" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control" placeholder="Dispositivos" name="dispositivos" value="{{ old('dispositivos') }}"/>
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
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                      </select>
                                          
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <select class="form-control" id="idtipousuario" name="idtipousuario" onchange="mostrarcampostecnicos(this.value)"  >
                                        <option disabled selected>Tipo Usuario</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Jefe Tecnología</option>
                                        <option value="3">Secretari@</option>
                                        <option value="4">Técnico</option>
                                        <option value="5">Usuario Final</option>
                                      </select>            
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback" hidden id="idextratecnico">
                                      <select class="form-control"  name="idextratecnico" >
                                        <option  disabled selected>Especialización</option>
                                        <option value="1">Sistemas</option>
                                      </select>        
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback" hidden  id="idarea">
                                      <select class="form-control" name="idarea" >
                                        <option disabled selected>Área</option>
                                        <option value="1">Rentas</option> 
                                        <option value="2">Contraluria</option>
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
                                      <input type="password" class="form-control" placeholder="Contraseña" name="password"/>
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                               </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="password" class="form-control" placeholder=" Confirmar contraseña" name="password_confirmation"/>
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
                            </div><!-- /.col -->
                  </div>


                      </form>

                   

                   

                      <!-- <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a> -->
                  </div><!-- /.form-box -->
              </div><!-- /.register-box -->
                <br>

                  <!-- TABLA DE LISTA DE USUARIOS -->

                 
          </div>

 

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
      <div>

        <div class="row register-box-body">
          <p> <h3>Lista de Usuarios</h3></p>
          <hr>
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th scope="col">Cédula</th>
                <th scope="col">Usuario</th>
                <th scope="col">Celular</th>
                <th scope="col">Sexo</th>
                <th scope="col">Estado</th>
                <th scope="col">Tipo Usuario</th>
                <th scope="col">Especialización</th>
                <th scope="col">Área</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </div>
@endsection
