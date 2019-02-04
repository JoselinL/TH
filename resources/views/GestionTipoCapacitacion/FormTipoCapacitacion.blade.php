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
            <input type="text" class="form-control" placeholder="Ingrese la descripción" name="descripcion" id="descTC" value="{{ old('descripcion') }}"/>
            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>
            @if($errors->has('descripcion'))
            <span style='color:red;'> {{ $errors->first('descripcion') }} </span>
            @endif

        </div>
    </div>

    <button type="button" class="btn btn-primary" onclick="ingresarTC()">Guardar</button>
</form>
