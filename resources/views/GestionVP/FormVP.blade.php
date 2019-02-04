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
                <label for="cantidad"><b>Cantidad:</b></label>
                <input type="text" class="form-control" name="cantidad" id="cantidadVP" placeholder="Ingrese la cantidad" value="{{ old('cantidad') }}"/>
                <span class="glyphicon glyphicon-file form-control-feedback"></span>
                </div>
                @if($errors->has('cantidad'))
                <span style='color:red;'> {{ $errors->first('cantidad') }} </span>
                @endif
            </div>


            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="vacacion_id"><b>Vacación:</b></label>
                <select class="form-control" name="vacacion_id" id="vacacionVP">
                    @foreach($vacacion as $v)
               
                        <option value="{{ $v->id }}">{{ $v->descripcion }}</option>
          
                    @endforeach
                 </select>
                </div>
                @if($errors->has('vacacion_id'))
                <span style='color:red;'> {{ $errors->first('vacacion_id') }} </span>
                @endif

            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="periodo_id"><b>Periodo:</b></label>
                <select class="form-control" name="periodo_id" id="periodoVP">
                    @foreach($periodo as $p)
               
                        <option value="{{ $p->id }}">{{ $p->descripcion }}</option>
          
                    @endforeach
                 </select>
                </div>
                @if($errors->has('periodo_id'))
                <span style='color:red;'> {{ $errors->first('periodo_id') }} </span>
                @endif

            </div>
        </div>


    <button type="button" class="btn btn-primary" onclick="ingresarVP()">Guardar</button>
</form>
