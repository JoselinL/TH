<div class="modal-body">
  <form id="formregistromodal"  method="post"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="id" id="idMarcacion1" hidden >
        <div class="row">
        
        
        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Registro:</b></label>
                <input type="file" class="form-control" id="regisID" name="registro"required />
              </div>
        </div>


        <input type="hidden" name="" id="idusuarioM">

      <div class="modal-footer">
        <button type="button" onclick="updateMarcacion();" data-dismiss="modal" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

  </div>