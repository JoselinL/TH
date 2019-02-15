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

<form role="form" id="form_Marcacion" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }} <!-- Para validar el token -->

     <div class="row">

          <div class="col-md-12">
            <div class="form-group has-feedback">
            <label for="registro"><b>Registro:</b></label>
            <input type="file" class="form-control" name="input_file" id="registroID" value="{{ old('registro') }}"/>
            </div>
            @if($errors->has('registro'))
            <span style='color:red;'> {{ $errors->first('registro') }} </span>
            @endif

        </div>
      </div>

      <input type="hidden" name="" id="idusuarioM">

   <button type="submit" class="btn btn-primary" onclick="">Guardar</button>
</form>
