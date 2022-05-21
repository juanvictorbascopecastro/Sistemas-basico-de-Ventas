 <!-- Large modal -->
  <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>-->

  <div class="modal fade modal-add-categoria" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header blue text-white">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabelDocente">
            <i class="fa fa-plus"></i> AGREGAR NUEVA CATEGORIA</h4>
        </div>
 
        <form class="form-horizontal form-label-left" id="add-categoria">
            <div class="modal-body">
                <div class="pl-7 pr-7 ml-7 mr-7">
                    <div class="form-group mb-0">
                        <label>Nombre Categoria*</label>
                        <input class="form-control" placeholder="Obligatorio" name="nombre">
                        <p class="help-block">Ingrese el nombre.</p>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input class="form-control" placeholder="Opcional." name="descripcion">
                        <p class="help-block">Ingrese una descripción de la categoria.</p>
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
