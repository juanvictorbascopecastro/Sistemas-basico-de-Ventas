<div class="modal fade modal-add-producto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header blue text-white">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabelDocente">
            <i class="fa fa-plus"></i> AGREGAR NUEVO PRODUCTO</h4>
        </div>
 
        <form class="form-horizontal form-label-left" id="add-producto">
            <div class="modal-body">
                <div class="pl-7 pr-7 ml-7 mr-7">
                    <div class="form-group mb-0">
                        <label>Nombre*</label>
                        <input class="form-control" placeholder="Obligatorio" name="nombre">
                        <p class="help-block">Ingrese el nombre del producto.</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group pr-2 mb-0">
                                <label>Precio</label>
                                <input class="form-control" placeholder="Obligatorio." name="precio">
                                <p class="help-block">Ingrese el precio del producto.</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group pl-2 mb-0">
                                <label>Stock</label>
                                <input class="form-control" placeholder="Obligatorio." name="stock">
                                <p class="help-block">Ingrese el stock del producto.</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label>Seleccionar Imagen</label>
                        <input type="file" class="form-control" id="selectImage">
                    </div>
                    <div class="form-group mb-2">
                        <label>Categoria producto</label>
                        <select class="form-control" name="categoria" id="select-categoria">
                            
                        </select>
                    </div>
                    <div class="form-group mt-7">
                        <label>Descripción</label>
                        <textarea class="form-control" rows="2" name="descripcion" placeholder="Opcional."></textarea>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove"></i>  CERRAR</button>
                <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> GUARDAR</button>
            </div>
        </form>
      </div>
    </div>
</div>
