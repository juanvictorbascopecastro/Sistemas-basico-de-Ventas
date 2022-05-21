<!DOCTYPE html>
<html lang="es">
<?php require 'views/template/header.php' ?>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php require 'views/template/navbar.php' ?>
            <?php require 'views/template/sidebar.php' ?>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h2>MI USUARIO</h2>
                    </div>
                </div>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Perfil de Usuario
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body m-7">
                                <form class="form-horizontal form-label-left" id="edit-usuario">
                                    <div class="form-group mb-0">
                                        <label>Nombre*</label>
                                        <input type="text" class="form-control" placeholder="Obligatorio" name="nombre" value="<?= $_SESSION['usuario']['nombre']?>">
                                        <p class="help-block">Ingrese el nombre.</p>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Apellido*</label>
                                        <input type="text" class="form-control" placeholder="Opcional." name="apellido" value="<?= $_SESSION['usuario']['apellido']?>">
                                        <p class="help-block">Ingrese su apellido.</p>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Telefono*</label>
                                        <input type="text" class="form-control" placeholder="Opcional." name="telefono" value="<?= $_SESSION['usuario']['telefono']?>">
                                        <p class="help-block">Ingrese su telefono.</p>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Rol de Usuario</label>
                                        <select class="form-control" <?= $_SESSION['usuario']['rol'] != 'admin' ? 'disabled' : ''?> name="rol">
                                            <option value="admin"  <?= $_SESSION['usuario']['rol'] == 'admin' ? 'selected' : ''?>>Administrador</option>
                                            <option value="cajero" <?= $_SESSION['usuario']['rol'] == 'cajero' ? 'selected' : ''?>>Cajero</option>
                                            <option value="cocinero" <?= $_SESSION['usuario']['rol'] == 'cocinero' ? 'selected' : ''?>>Cocinero</option>
                                            <option value="mesero"  <?= $_SESSION['usuario']['rol'] == 'mesero' ? 'selected' : ''?>>Mesero</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0 pb-0 mt-7 text-right">
                                        <button type="submit" class="btn btn-primary mb-0"><i class="fa fa-save"></i> GUARDAR</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Datos de Acceso
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body m-7">
                                <form class="form-horizontal form-label-left" method="POST" id="acceso-usuario">
                                    <div class="form-group mb-0">
                                        <label>Email*</label>
                                        <input type="text" class="form-control" placeholder="Opcional." name="email" value="<?= $_SESSION['usuario']['email']?>">
                                        <p class="help-block">Ingrese su correo electronico.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña Actual*</label>
                                        <input type="password" class="form-control" placeholder="Opcional." name="password">
                                        <p class="help-block">Ingrese la contraseña actual.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Nueva Contraseña*</label>
                                        <input type="password" class="form-control" placeholder="Opcional." name="password2">
                                        <p class="help-block">Ingrese la contraseña de acceso.</p>
                                    </div>
                                    <div class="form-group mb-0 pb-0 mt-7 text-right">
                                        <button type="submit" class="btn btn-primary mb-0"><i class="fa fa-save"></i> ACTUALIZAR</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php require 'views/template/footer.php' ?>
    <script type="text/javascript">
    const idpersona = "<?= $_SESSION['usuario']['idpersona']; ?>";
    </script>
</body>
</html>
