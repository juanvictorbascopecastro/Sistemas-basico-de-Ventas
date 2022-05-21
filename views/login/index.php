<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->data['title']; ?></title>
    <link href="<?= BASE_URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL; ?>public/css/sb-admin.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Por favor ingrese su datos de acceso</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="login-form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Correo..." name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña..." name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me" checked>Recuerdame
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Ingresar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    const base_url = "<?= BASE_URL; ?>";
    </script>
    <script src="<?= BASE_URL?>public/js/sweetalert2.js"></script>

    <script src="<?= BASE_URL?>public/js/index.js"></script>
    <script src="<?= BASE_URL?>public<?= $this->data['js']?>"></script>
</body>
</html>