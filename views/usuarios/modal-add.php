 <!-- Large modal -->
  <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>-->

  <div class="modal fade modal-add-usuario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header blue text-white">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabelDocente">
            <i class="fa fa-plus"></i> AGREGAR NUEVO USUARIO</h4>
        </div>
 
        <form class="form-horizontal form-label-left" method="POST" id="add-usuario">
          <div class="modal-body">
              <div class="pl-7 pr-7 ml-7 mr-7">
                <div class="form-group mb-0">
                    <label>Nombre*</label>
                    <input type="text" class="form-control" placeholder="Obligatorio" name="nombre">
                    <p class="help-block">Ingrese el nombre.</p>
                </div>
                <div class="form-group mb-0">
                    <label>Apellido*</label>
                    <input type="text" class="form-control" placeholder="Opcional." name="apellido">
                    <p class="help-block">Ingrese su apellido.</p>
                </div>
                <div class="form-group mb-0">
                    <label>Telefono*</label>
                    <input type="text" class="form-control" placeholder="Opcional." name="telefono">
                    <p class="help-block">Ingrese su telefono.</p>
                </div>
                <div class="form-group mb-2">
                    <label>Rol de Usuario</label>
                    <select class="form-control" name="rol">
                        <option value="admin">Administrador</option>
                        <option value="cajero">Cajero</option>
                        <option value="cocinero">Cocinero</option>
                        <option value="mesero">Mesero</option>
                     </select>
                </div>
                <hr class="mt-0 mb-1">
                <div class="form-group mb-0">
                    <label>Email*</label>
                    <input type="text" class="form-control" placeholder="Opcional." name="email">
                    <p class="help-block">Ingrese su correo electronico.</p>
                </div>
                <div class="form-group">
                    <label>Contraseña*</label>
                    <input type="password" class="form-control" placeholder="Opcional." name="password">
                    <p class="help-block">Asigne una contraseña de acceso.</p>
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
