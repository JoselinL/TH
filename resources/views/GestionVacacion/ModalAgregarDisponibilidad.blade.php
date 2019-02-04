<div disabled class="modal fade" id="agregardisponibilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="bodymodalmarca">
      <form  method="POST" role="form" action="" enctype="multipart/form-data" id="formHorario">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle" style="text-align: center"><b>CANTIDAD DE DÍAS DISPONIBLES</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>  </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="_method" value="PUT">

        <input type="hidden" name="_method" id="id">

        @include('GestionVacacion.MostrarD')
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Salir</button>
        </div>

      </form>
    </div>
  </div>
</div>
