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
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="cantidadDiasPeriodo"><b>Cantidad de días:</b></label>
                <input type="text" class="form-control" name="cantidadDiasPeriodo" id="cantDiasPeriPP" placeholder="Ingrese la cantidad de días" value="{{ old('cantidadDiasPeriodo') }}"/>
                <span class="glyphicon glyphicon-file form-control-feedback"></span>
                </div>
                @if($errors->has('cantidadDiasPeriodo'))
                <span style='color:red;'> {{ $errors->first('cantidadDiasPeriodo') }} </span>
                @endif
            </div>


            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="periodo_id"><b>Periodo:</b></label>
                <select class="form-control" name="periodo_id" id="periodoIDPP">
                    @foreach($periodo as $p)
               
                <option value="{{ $p->id }}"><?php echo $p->fechaInicio.'  -  '.$p->fechaFin ?></option>
          
                    @endforeach
                 </select>
                </div>
                @if($errors->has('periodo_id'))
                <span style='color:red;'> {{ $errors->first('periodo_id') }} </span>
                @endif

            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="persona_id"><b>Persona:</b></label>
                <select class="form-control" name="persona_id" id="personaIdPP">
                    @foreach($persona as $p)
               
                <option value="{{ $p->id }}">{{ $p->cedula }}</option>
          
                    @endforeach
                 </select>
                </div>
                @if($errors->has('persona_id'))
                <span style='color:red;'> {{ $errors->first('persona_id') }} </span>
                @endif

            </div>
        </div>


    <button type="button" class="btn btn-primary" onclick="ingresarPP()">Guardar</button>
</form>
