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
            <label for="tipo"><b>Tipo de usuario:</b></label>
            <input type="text" class="form-control" placeholder="Ingrese el tipo de usuario" name="tipo" id="tipoTU" value="{{ old('tipo') }}"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            @if($errors->has('tipo'))
            <span style='color:red;'> {{ $errors->first('tipo') }} </span>
            @endif

        </div>
    </div>

    <button type="button" class="btn btn-primary" onclick="ingresarTU()">Guardar</button>
</form>
