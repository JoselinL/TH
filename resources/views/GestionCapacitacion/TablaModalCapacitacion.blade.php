<div class="modal-body">
  <form id="formregistromodal"  method="post"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="id" id="idCapacitacion1" hidden >
        <div class="row">
        

        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label > <b >Descripción:</b></label>
                <input type="text" class="form-control" id="descCapacitacion" name="descripcion"required />
              </div>
        </div>
        
        

        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Fecha de inicio:</b></label>
                <input type="date" class="form-control" id="fecIniCapacitacion" name="fechaInicio"required />
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Fecha de finalización:</b></label>
                <input type="date" class="form-control" id="fechFinCapacitacion" name="fechaFin"required />
              </div>
        </div>


        

        <div class="col-md-4">
              <div class="form-group has-feedback" id="tipoCapacitacion_id">
                <label for="tipoCapacitacion_id">Tipo de capacitación:</label>

                  <select class="form-control" name="tipoCapacitacion_id" id="tipoCapa_id">
                    @if(isset($tipocapacitacion))
                    @foreach($tipocapacitacion as $s)
                  <option value="{{ $s->id}}">{{ $s->descripcion }}</option>               
                    @endforeach
                    @endif
                  </select>
        </div>
        </div>

          <div class="col-md-4">
             <div class="form-group has-feedback">
                <label > <b >Documento:</b></label>
                <input type="file" class="form-control" id="docCapacitacion" name="documento"required />
              </div>
        </div>

        <input type="hidden" name="" id="idusuarioC">
        

      <div class="modal-footer">
        <button type="button" onclick="updateCapacitacion();" data-dismiss="modal" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
  </div>