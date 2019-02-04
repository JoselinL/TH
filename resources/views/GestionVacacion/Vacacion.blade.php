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
                    <input type="hidden" name="" id="idusuario1">
                  @else
                    <input type="hidden" name="" value="{{ Auth::user()->id }}" id="idusuario1">
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
                    <div class="col-md-11">
                        <div class="panel panel-default">
                        <legend class="text-center header">
                           <span class=" text-center"></span>
                            <span><b> INGRESAR SOLICITUD DE VACACIONES </b></span> 
                        </legend>
                            <div class="panel-body"> 
                                
                                @if(isset($edit))  
                                    @include('GestionVacacion.ModificarVacacion')
                                @else
                                    @include('GestionVacacion.FormVacacion')
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
                        <span> <b>VACACIONES</b> </span> 
                    </legend>
                        <div class="panel-body"> 
                                @if(isset($edit))
                                @else
                                    @include('GestionVacacion.MostrarVacacion')
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
  @include('GestionVacacion.ModalAgregarDisponibilidad')
  @include('GestionVacacion.ModalVacacion')
  
@endsection
                                 
                             
