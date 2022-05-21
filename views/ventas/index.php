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
                        <h2>Ventas</h2>
                    </div>
                    <div class="col-sm-12 col-md-6 row right mt-7">
                        <a class="btn btn-primary" href="<?php BASE_URL;?>ventas/nuevaventa">Nueva Venta</a>
                    </div>
                </div>
                <hr class="mt-0 mb-3">
                <!--<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Clientes <small>Modulo de clientes</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-users"></i> Clientes
                            </li>
                        </ol>
                    </div>
                </div>-->
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-6 pt-2">
                                        <b>Tabla de Ventas</b>
                                    </div>
                                    <div class="col-lg-6 right">
                                        <div class="row">
                                            <div class="col-lg-5 right p-0">
                                                <label for="fecha-desde" class="col-sm-3 col-form-label mt-4">Desde</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" id="fecha-desde">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 right p-0">
                                                <label for="fecha-hasta" class="col-sm-3 col-form-label mt-4">Hasta</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" id="fecha-hasta">
                                                </div>
                                            </div>
                                            <div class="col-lg-2 left">
                                                <button class="btn btn-success" id="btnSearch"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-ventas">
                                    <thead>
                                        <tr>
                                            <th>idventas</th>
                                            <th>idcliente</th>
                                            <th>idusuario</th>
                                            <th>fecha</th>
                                            <th>detalles</th>
                                            <th>cliente</th>
                                            <th>dni</th>
                                            <th>usuario</th>
                                            <th>rol</th>
                                            <th class="text-center">opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <div class="row">
                    <?php require './views/ventas/factura.php' ?>
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
