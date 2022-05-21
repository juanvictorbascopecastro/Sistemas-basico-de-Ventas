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
                        <h2>Reportes</h2>
                    </div>
                </div>
                <hr class="mb-2 mt-0">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> VENTAS
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body" id="grafica-ventas-realizadas">
                                
                            </div>
                                <!-- /.panel-body -->
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> CLIENTES
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body" id="grafica-clientes">
                                
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> PRODUCTOS
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body" id="grafica-productos">
                                
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!--<script src="<?= BASE_URL?>public/js/highcharts.js"></script>-->
    <?php require 'views/template/footer.php' ?>
</body>

</html>
