<div class="modal-body">
  <form id="formregistromodal"  method="post"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="id" id="idPermiso1" hidden >
        <div class="row">
        

        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label > <b >Descripción:</b></label>
                <input type="text" class="form-control" id="descPermiso" name="descripcion"required />
              </div>
        </div>
        
        
        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Fecha de inicio:</b></label>
                <input type="date" class="form-control" id="fecIniPermiso" name="fechaInicio"required />
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Fecha de finalización:</b></label>
                <input type="date" class="form-control" id="fechFinPermiso" name="fechaFin"required />
              </div>
        </div>



        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Hora de inicio:</b></label>
                <input type="time" class="form-control" id="horaIniPermiso" name="horaInicio"required />
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Hora de finalización:</b></label>
                <input type="time" class="form-control" id="horaFinPermiso" name="horaFin"required />
              </div>
        </div>



        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b >Justificación:</b></label>
                <textarea class="form-control" id="justPermiso" name="justificacion"required/> </textarea>
              </div>
        </div>


         <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Razón del permiso:</b></label>
                <select class="form-control" id="catalogoPermiso" name="catalogo" >
                        <option disabled selected>Razón del permiso</option>
                        <option>Particular</option>
                        <option>Calamidad doméstica</option>
                        <option>Enfermedad</option>
                        <option>Otro</option>
                </select>
              </div>
        </div>


         <input type="hidden" name="" id="idusuario">


      <div class="modal-footer">
        <button type="button" onclick="updatePermiso();" data-dismiss="modal" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

  </div>