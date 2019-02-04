@if(session()->has('msj'))
<div class="alert alert-success" role="alert">
  {{ session('msj') }}
</div>
@endif

@if(session()->has('errormsj'))
<div class="alert alert-danger" role="alert">
  ¡Error al guardar los datos!
</div>
@endif 

<form role="form" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }} <!-- Para validar el token -->


        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label for="descripcion"><b>Descripción:</b></label>
                <input type="text" class="form-control" placeholder="Ingrese la descripción" name="descripcion" id="descripcionPer" value="{{ old('descripcion') }}"/>
                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>
                @if($errors->has('descripcion'))
                <span style='color:red;'> {{ $errors->first('descripcion') }} </span>
                @endif

            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="fechaInicio"><b>Fecha de inicio:</b></label>
                <input type="date" class="form-control" name="fechaInicio" id="fechaIniPer" value="{{ old('fechaInicio') }}"/>
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
                @if($errors->has('fechaInicio'))
                <span style='color:red;'> {{ $errors->first('fechaInicio') }} </span>
                @endif

            </div>


            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="fechaFin"><b>Fecha de finalización:</b></label>
                <input type="date" class="form-control" name="fechaFin" id="fechaFinPer" value="{{ old('fechaFin') }}"/>
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
                @if($errors->has('fechaFin'))
                <span style='color:red;'> {{ $errors->first('fechaFin') }} </span>
                @endif

            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="horaInicio"><b>Hora de inicio:</b></label>
                <input type="time" class="form-control" name="horaInicio" id="horaInicioPer" value="{{ old('horaInicio') }}"/>
                <span class="glyphicon glyphicon-time form-control-feedback"></span>
                </div>
                @if($errors->has('horaInicio'))
                <span style='color:red;'> {{ $errors->first('horaInicio') }} </span>
                @endif

            </div>

            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="horaFin"><b>Hora de finalización:</b></label>
                <input type="time" class="form-control" name="horaFin" id="horaFinPer" value="{{ old('horaFin') }}"/>
                <span class="glyphicon glyphicon-time form-control-feedback"></span>
                </div>
                @if($errors->has('horaFin'))
                <span style='color:red;'> {{ $errors->first('horaFin') }} </span>
                @endif

            </div>
        </div>


        <div class="row">
        <div class="col-md-12">
            <div class="form-group has-feedback">
            <label for="justificacion"><b>Justificación:</b></label>
            <textarea class="form-control" name="justificacion" id="justificacionPer" placeholder="Ingrese la justificación" value="{{ old('justificacion') }}"></textarea>
            <span class="glyphicon glyphicon-file form-control-feedback"></span>
            </div>
            @if($errors->has('justificacion'))
            <span style='color:red;'> {{ $errors->first('justificacion') }} </span>
            @endif

            </div>
        </div>


         <input type="hidden" name="" id="idusuario">

    
    <button type="button" class="btn btn-primary" onclick="ingresarPermiso()">Guardar</button>
</form>
