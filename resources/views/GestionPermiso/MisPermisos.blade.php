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
                  @guest
                    <input type="hidden" name="" id="idusuario">
                  @else
                    <input type="hidden" name="" value="{{ Auth::user()->id }}" id="idusuario">
                  @endguest

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

          <div class="container">
            <div class="row">
                   
            </div>
            <br><br>

            <div class="row">
                <div class="col-md-11">
                    <div class="panel ">
                    <legend class="text-center header">
                        <span class=" text-center"></span>
                        <span><h3><b>MIS PERMISOS</b></h3></span> 
                    </legend>
                    
                     <div class="row">
                               <div class="col-md-3" align="center">
                               </div>
                                <div class="col-md-2" align="center">
                                 <div data-toggle="tooltip" data-placement="top" title="Su solicitud de permiso fue aprobada" style=" height: 80px;
                                                width:80px;
                                                background-color: #31B404;
                                                border-radius: 50%;
                                                display: inline-block;">
                                    <i style="margin-top: 16px;color: white" class="fa fa-check fa-fw fa-3x"></i>
                                   </div>
                                   <br>
                                  <label><b>Aprobado</b></label>
                                </div>
                                 <div class="col-md-2" align="center">
                                  <div data-toggle="tooltip" data-placement="top" title="Su solicitud de permiso esta pendiente de aprobación"  style=" height: 80px;
                                                width:80px;
                                                background-color: #FACC2E;
                                                border-radius: 50%;
                                                display: inline-block;">
                                    <i style="margin-top: 16px; color: white" class="fa fa-exclamation-triangle fa-fw fa-3x"></i>
                                   </div>
                                  <br>
                                  <label><b>Pendiente</b></label>
                                </div>
                                <div class="col-md-2" align="center">
                                  <div data-toggle="tooltip" data-placement="top" title="Su solicitud de permiso no fue aprobada" style=" height: 80px;
                                                width:80px;
                                                background-color: #DF0101;
                                                border-radius: 50%;
                                                display: inline-block;">
                                    <i style="margin-top: 16px;color: white" class="fa fa-times fa-fw fa-3x"></i>
                                   </div>
                                   <br>
                                  <label><b>No Aprobado</b></label>
                                </div>
                                <div class="col-md-3" align="center">
                               </div>
                        </div>


                        <div class="panel-body"> 
                                @if(isset($edit))
                                @else
                                    @include('GestionPermiso.TablaPermisosUsuario')
                                @endif
                        </div>
                    </div>
                </div>
        </div>

    </div>
    </div><!-- /.register-box -->
                <br>

                  <!-- TABLA DE LISTA DE USUARIOS -->

                 
          </div>


        </div>
    </div>
      <div>
     </div>
  </div>
  
  <div>
        @include('GestionPermiso.mensajeObservacion_modal')
  </div>
  @include('GestionPermiso.ModalPermisoUsuario')

  
  
@endsection
                                 
            <script>
            $(function () {
                  $('input').iCheck({
                      checkboxClass: 'icheckbox_square-blue',
                      radioClass: 'iradio_square-blue',
                      increaseArea: '20%' // optional
                  });
              });
          </script>                     
