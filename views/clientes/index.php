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
                        <h2>Clientes</h2>
                    </div>
                    <div class="col-sm-12 col-md-6 right mt-7">
                        <button class="btn btn-primary" id="btnAdd">Nuevo Cliente</button>
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
                                Tabla de Clientes
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="dataTables-cliente">
                                    <thead>
                                        <tr>
                                            <th>idcliente</th>
                                            <th>idpersona</th>
                                            <th>nombre</th>
                                            <th>apellido</th>
                                            <th>telefono</th>
                                            <th>dni</th>
                                            <th class="text-center">opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body-cliente">
                                        <tr class="odd gradeX">
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <div class="row">
                    <?php require './views/clientes/modal-add.php' ?>
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
