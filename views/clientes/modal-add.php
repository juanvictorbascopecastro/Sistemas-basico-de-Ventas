  <div class="modal fade modal-add-cliente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header blue text-white">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabelDocente">
            <i class="fa fa-plus"></i> AGREGAR NUEVO CLIENTE</h4>
        </div>
 
        <form class="form-horizontal form-label-left" method="POST" id="add-cliente">
            <div class="modal-body">
                <div class="pl-7 pr-7 ml-7 mr-7">
                    <div class="form-group mb-0">
                        <label>Nombre*</label>
                        <input class="form-control" placeholder="Obligatorio." name="nombre">
                    </div>
                    <div class="form-group mb-0">
                        <label>Apellido*</label>
                        <input class="form-control" placeholder="Obligatorio." name="apellido">
                    </div>
                    <div class="form-group mb-0">
                        <label for="telephone">Telefono*</label>
                        <input class="form-control" placeholder="Obligatorio." name="telefono" id="telephone" type="tel" data-validate-length-range="8,20">
                    </div>
                    <div class="form-group">
                        <label>DNI*</label>
                        <input class="form-control" placeholder="Obligatorio." name="dni">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove"></i>  CERRAR</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> GUARDAR</button>
            </div>
        </form>
      </div>
    </div>
  </div>
