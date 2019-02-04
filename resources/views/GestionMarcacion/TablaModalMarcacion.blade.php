<div class="modal-body">
  <form id="formregistromodal"  method="post"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="id" id="idMarcacion1" hidden >
        <div class="row">
        
        <div class="col-md-4">
              <div class="form-group has-feedback" id="persona_id">
                <label for="persona_id">Persona:</label>

                  <select class="form-control" name="persona_id" id="persona_idMarcacion">
                    @if(isset($persona))
                    @foreach($persona as $s)
                  <option value="{{ $s->id}}">{{ $s->cedula }}</option>               
                    @endforeach
                    @endif
                  </select>
        </div>
        </div>


      <div class="modal-footer">
        <button type="button" onclick="updateMarcacion();" data-dismiss="modal" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

  </div>