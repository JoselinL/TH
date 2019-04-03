<!-- <div class="modal-body">
  <form id="formregistromodal"  method="post"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="id" id="idPP1" hidden >
        <div class="row">
        
        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Cantidad de días:</b></label>
                <input type="text" class="form-control" id="CDP_PP" name="cantidadDiasPeriodo"required />
              </div>
        </div>


        <div class="col-md-4">
              <div class="form-group has-feedback" id="periodo_id">
                <label for="periodo_id">Periodo:</label>

                  <select class="form-control" name="periodo_id" id="Id_PeriodoPP">
                    @if(isset($periodo))
                    @foreach($periodo as $p)
                       <option value="{{ $p->id}}">{{ $p->descripcion }}</option> 
                    @endforeach
                    @endif
                  </select>
        </div>
        </div>


        <div class="col-md-4">
              <div class="form-group has-feedback" id="user_id">
                <label for="user_id">Persona:</label>

                  <select class="form-control" name="user_id" id="Id_PersonaPP">
                    @if(isset($usuario))
                    @foreach($usuario as $s)
                  <option value="{{ $s->id}}">{{ $s->nombres }}</option>               
                    @endforeach
                    @endif
                  </select>
        </div>
        </div>


      <div class="modal-footer">
        <button type="button" onclick="updatePP();" data-dismiss="modal" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

  </div> -->