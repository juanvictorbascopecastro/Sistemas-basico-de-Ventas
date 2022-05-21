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
                <div class="col-sm-12">
                    <?php  require './views/categoria/modal-add.php';  ?>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h2>Categorias</h2>
                    </div>
                    <div class="col-sm-12 col-md-6 right mt-7">
                        <button class="btn btn-primary" class="btn btn-primary" id="btnAdd">Nueva Categoria</button>
                    </div>
                </div>
                <!-- Contenido -->
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Categorias de productos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group" id="list-categorias">
                                <div class="text-center">
                                    ¡No hay registros!
                                </div>
                            </div>
                            <!-- /.list-group -->
                            <!--<a href="#" class="btn btn-default btn-block">View All Alerts</a>-->
                        </div>
                        <!-- /.panel-body -->
                    </div>
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
