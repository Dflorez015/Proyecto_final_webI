<?php include('public/includes/header.php'); ?>
<div class="container">
    <div class="div-center">
        <div class="card text-center shadow-lg  mb-5 bg-white rounded " id="login_cont">
            <div class="card-header bg-dark text-white">
                Inicio de sesión
            </div>
            <div class="card-body text-dark ">
                <p class="card-text">
                    <div class="row">
                        <div class="col-x1-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <img src="public/imagenes/perfil.jpg" class="img-fluid rounded-circle">
                            <h3 class="pb-3">Bienvenido</h3>
                        </div>
                        <div class="col-x1-6 col-lg-6 col-md-6 col-sm-12 col-12 rounded border shadow-sm" style="background: #e4e9ed;">
                            <form action="database/validate.php" method="POST">
                                <div class="form-group">
                                    <label for="dir_email">Correo electrónico</label>
                                    <input type="email" name="email" class="form-control" id="dir_email" aria-describedby="emailHelp" required>
                                </div>
                                <div class="form-group">
                                    <label for="dir_pass">Contraseña</label>
                                    <input type="password" name="pass" class="form-control" id="dir_pass" required>
                                </div>
                                <?php if (isset($_SESSION['error_validation'])) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $_SESSION['error_validation'] ?>
                                    </div>
                                <?php session_unset();
                                } ?>
                                <div class="form-group">
                                    <button type="submit" name="validar" class="btn btn-primary">Ingresar</button>
                                    <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
                                    <p class="pt-4  text-left">Si no está registrado, haga click <a href="registro.php">aquí</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>
</div>
<?php include('public/includes/footer.php') ?>