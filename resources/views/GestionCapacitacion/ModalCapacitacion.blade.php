<div class="modal fade" id="actualizarCapacitacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form  method="POST" role="form" enctype="multipart/form-data" id="frmeditarSolicitud">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle" style="text-align: center" style="font-size: 18px"><b>DATOS DE LA CAPACITACIÓN</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         @include('GestionCapacitacion.TablaModalCapacitacion')
        </div>
        <div class="modal-footer">
        </div>
      </form>
    </div>
  </div>
</div>