<div class="modal-body">
  <form id="formregistromodal"  method="post"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="id" id="idPeriodo1" hidden >
        <div class="row">
        

        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Descripción:</b></label>
                <input type="text" class="form-control" id="descPeriodo" name="descripcion"required />
              </div>
        </div>

        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Fecha de inicio:</b></label>
                <input type="date" class="form-control" id="fechaInicioPeriodo" name="fechaInicio"required />
              </div>
        </div>

        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Fecha de finalización:</b></label>
                <input type="date" class="form-control" id="fechaFinPeriodo" name="fechaFin"required />
              </div>
        </div>


       <!--  <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Estado:</b></label>
                <select class="form-control" id="estadoPeriodo" name="estado" >
                        <option disabled selected>Estado</option>
                        <option>Activo</option>
                </select>
              </div>
        </div> -->


      <div class="modal-footer">
        <button type="button" onclick="updatePeriodo();" data-dismiss="modal" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
  </div>