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
                <div class="row text-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-desktop fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $this->data['ventas']?></div>
                                        <div>Ventas!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <a class="pull-left" href="<?php echo BASE_URL?>ventas">Ver Detalles</a>
                                    <a class="pull-right" href="<?php echo BASE_URL?>ventas"><i class="fa fa-arrow-circle-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-table fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $this->data['productos']?></div>
                                        <div>Productos!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <a class="pull-left" href="<?php echo BASE_URL?>productos">Ver Detalles</a>
                                    <a class="pull-right" href="<?php echo BASE_URL?>productos"><i class="fa fa-arrow-circle-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $this->data['clientes']?></div>
                                        <div>Clientes!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <a class="pull-left" href="<?php echo BASE_URL?>clientes">Ver Detalles</a>
                                    <a class="pull-right" href="<?php echo BASE_URL?>clientes"><i class="fa fa-arrow-circle-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php if($_SESSION['usuario']['rol'] == 'admin'){?>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $this->data['usuarios']?></div>
                                            <div>Empleados!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <a class="pull-left" href="<?php echo BASE_URL?>usuarios">Ver Detalles</a>
                                        <a class="pull-right" href="<?php echo BASE_URL?>usuarios"><i class="fa fa-arrow-circle-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> GANANCIAS
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body" id="grafica-ventas-ganacia">
                                
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
