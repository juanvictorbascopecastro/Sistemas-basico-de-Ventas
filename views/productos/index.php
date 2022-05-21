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
                        <h2>Productos</h2>
                    </div>
                    <div class="col-sm-12 col-md-6 right mt-7">
                        <button class="btn btn-primary" id="btnAdd">Nuevo Productos</button>
                    </div>
                </div>
                <hr class="mb-2 mt-0">
                <div class="row" id="productos-list">
                    <div class="col-sm-12 mt-4 mb-4 text-center">
                        <strong>¡No hay registros de productos!</strong>
                    </div>
                    <!--<div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <div class="card">
                            <div class="card__header">
                            <img src="<?= BASE_URL;?>public/img/img3.jpeg" alt="card__image" class="card__image" width="600">
                            </div>
                            <div class="card__body">
                            <span class="tag tag-blue">Plato fuerte</span>
                            <span class="text-right">Bs. 67</span>
                            <h4>Tiras a la parrilla</h4>
                            <p>¡Sin descripción!</p>
                            </div>
                            <div class="card__footer">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</button>
                                <button class="btn btn-danger ml-1 btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
                            </div>
                        </div>
                    </div>-->
                    <!--<div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <div class="card">
                            <div class="card__header">
                            <img src="<?= BASE_URL;?>public/img/img2.jpeg" alt="card__image" class="card__image" width="600">
                            </div>
                            <div class="card__body">
                            <span class="tag tag-brown">Plato fuerte</span>
                            <h4>Bife chorizo</h4>
                            <p>¡Sin descripción!</p>
                            </div>
                            <div class="card__footer">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</button>
                                <button class="btn btn-danger ml-1 btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <div class="card">
                            <div class="card__header">
                            <img src="<?= BASE_URL;?>public/img/img4.jpeg" alt="card__image" class="card__image" width="600">
                            </div>
                            <div class="card__body">
                            <span class="tag tag-red">Plato fuerte</span>
                            <h4>Cuadril</h4>
                            <p>¡Sin descripción!</p>
                            </div>
                            <div class="card__footer">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</button>
                                <button class="btn btn-danger ml-1 btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <div class="card">
                            <div class="card__header">
                            <img src="<?= BASE_URL;?>public/img/img2.jpeg" alt="card__image" class="card__image" width="600">
                            </div>
                            <div class="card__body">
                            <span class="tag tag-red">Plato fuerte</span>
                            <h4>Tiras a la parrilla</h4>
                            <p>Sin descripcion+!</p>
                            </div>
                            <div class="card__footer">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</button>
                                <button class="btn btn-danger ml-1 btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
                            </div>
                        </div>
                    </div>-->
                </div>
                <div class="row">
                    <?php require './views/productos/modal-add.php' ?>
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
