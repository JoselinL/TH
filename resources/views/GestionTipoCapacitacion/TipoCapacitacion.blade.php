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

<div class="container">
            <div class="row">
                    <div class="col-md-11">
                        <div class="panel panel-default">
                        <legend class="text-center header">
                           <span class=" text-center"></span>
                            <span> <b>INGRESAR TIPO DE CAPACITACIÓN </b></span> 
                        </legend>
                            <div class="panel-body"> 
                                
                                @if(isset($edit))  
                                    @include('GestionTipoCapacitacion.ModificarTipoCapacitacion')
                                @else
                                    @include('GestionTipoCapacitacion.FormTipoCapacitacion')
                                @endif
                                
                            </div>
                            
                        </div>
                    </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col-md-11">
                    <div class="panel ">
                    <legend class="text-center header">
                        <span class=" text-center"></span>
                        <span> <b>TIPOS DE CAPACITACIONES</b> </span> 
                    </legend>
                        <div class="panel-body"> 
                                @if(isset($edit))
                                @else
                                    @include('GestionTipoCapacitacion.MostrarTipoCapacitacion')
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
  @include('GestionTipoCapacitacion.ModalTipoCapacitacion')
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
