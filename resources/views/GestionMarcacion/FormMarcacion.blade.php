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
          <label for="persona_id"><b>Persona:</b></label>
          <select class="form-control" name="persona_id" id="personaIdMar">
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

    <button type="button" class="btn btn-primary" onclick="ingresarMarcacion()">Guardar</button>
</form>
