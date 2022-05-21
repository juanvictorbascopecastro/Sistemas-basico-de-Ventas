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
                        <h2>Usuarios</h2>
                    </div>
                    <div class="col-sm-12 col-md-6 right mt-7">
                        <button class="btn btn-primary" id="btnAdd">Nuevo Usuario</button>
                    </div>
                </div>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tabla de Usuarios
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-usuarios">
                                    <thead>
                                        <tr>
                                            <th>idpersona</th>
                                            <th>idusuarios</th>
                                            <th>nombre</th>
                                            <th>apellido</th>
                                            <th>telefono</th>
                                            <th>email</th>
                                            <th>rol</th>
                                            <th>opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body-usuarios">
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <div class="row">
                    <?php require './views/usuarios/modal-add.php' ?>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php require 'views/template/footer.php' ?>
</body>
</html>
