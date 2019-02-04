<div class="modal-body">
  <form id="formregistromodal"  method="post"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="id" id="idVP1" hidden >
        <div class="row">
        
        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Cantidad:</b></label>
                <input type="text" class="form-control" id="cantidada_idVP" name="cantidad"required />
              </div>
        </div>


        <div class="col-md-4">
              <div class="form-group has-feedback" id="vacacion_id">
                <label for="vacacion_id">Vacación:</label>

                  <select class="form-control" name="vacacion_id" id="Vacacion_idVP">
                    @if(isset($vacacion))
                    @foreach($vacacion as $v)
                      <option value="{{ $v->id}}">{{ $v->descripcion }}</option> ?>              
                    @endforeach
                    @endif
                  </select>
        </div>
        </div>


        <div class="col-md-4">
              <div class="form-group has-feedback" id="periodo_id">
                <label for="periodo_id">Periodo:</label>

                  <select class="form-control" name="periodo_id" id="Periodo_idVP">
                    @if(isset($periodo))
                    @foreach($periodo as $p)
                  <option value="{{ $p->id}}">{{ $p->descripcion }}</option>               
                    @endforeach
                    @endif
                  </select>
        </div>
        </div>


      <div class="modal-footer">
        <button type="button" onclick="updateVP();" data-dismiss="modal" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

  </div>