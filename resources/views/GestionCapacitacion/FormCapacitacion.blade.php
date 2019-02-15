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

<form role="form" id="form_Documento" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }} <!-- Para validar el token -->

        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label for="descripcion"><b>Descripción:</b></label>
                <input type="text" class="form-control" placeholder="Ingrese la descripción" name="descripcion" id="descripcionCap" value="{{ old('descripcion') }}"/>
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
                <label for="documento"><b>Documento:</b></label>
                <input type="file" class="form-control" name="input_file" id="documentoCap" value="{{ old('documento') }}"/>

                </div>
                @if($errors->has('documento'))
                <span style='color:red;'> {{ $errors->first('documento') }} </span>
                @endif

            </div>
        
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="fechaInicio"><b>Fecha de inicio:</b></label>
                <input type="date" class="form-control" name="fechaInicio" id="fechaIniCap" value="{{ old('fechaInicio') }}"/>
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
                @if($errors->has('fechaInicio'))
                <span style='color:red;'> {{ $errors->first('fechaInicio') }} </span>
                @endif

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="fechaFin"><b>Fecha de finalización:</b></label>
                <input type="date" class="form-control" name="fechaFin" id="fechaFiniCap" value="{{ old('fechaFin') }}"/>
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
                @if($errors->has('fechaFin'))
                <span style='color:red;'> {{ $errors->first('fechaFin') }} </span>
                @endif

            </div>
        
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="tipoCapacitacion_id"><b>Tipo de capacitación:</b></label>
                <select class="form-control" name="tipoCapacitacion_id" id="tipcapId">
                    @foreach($tipocapacitacion as $tc)
               
                <option value="{{ $tc->id }}">{{ $tc->descripcion }}</option>
          
                    @endforeach
                 </select>
                
                </div>
                @if($errors->has('tipoCapacitacion_id'))
                <span style='color:red;'> {{ $errors->first('tipoCapacitacion_id') }} </span>
                @endif

            </div>
        </div>

            <input type="hidden" name="" id="idusuarioC">

    <button type="submit" class="btn btn-primary" onclick="">Guardar</button>
</form>
