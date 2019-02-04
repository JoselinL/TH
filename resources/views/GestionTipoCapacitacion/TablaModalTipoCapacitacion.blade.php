<div class="modal-body">
  <form id="formregistromodal"  method="post"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="id" id="idtipoC1" hidden >
        <div class="row">
        

        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label > <b >Descripción:</b></label>
                <input type="text" class="form-control" id="descTCap" name="descripcion"required />
              </div>
        </div>


      <div class="modal-footer">
        <button type="button" onclick="updateTC();" data-dismiss="modal" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
  </div>