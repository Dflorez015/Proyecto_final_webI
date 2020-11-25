<?php 
$tipo_id = '';
if (isset($_GET['tipo_id'])) {
    $tipo_id = $_GET['tipo_id'];
}
include('public/includes/header.php'); ?>
<div class="container">
    <div class="div-center" id="center-register">
        <div class="card text-center shadow-lg  mb-5 bg-white rounded">
            <div class="card-header bg-dark text-white">
                Formulario de registro
            </div>
            <div class="card-body text-dark ">
                <p class="card-text">
                    <div class="row">
                        <div class="col-x1-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <img src="public/imagenes/registro.png" class="img-fluid mt-5 mb-5">
                        </div>
                        <div class="col-x1-6 col-lg-6 col-md-6 col-sm-12 col-12 rounded border shadow-sm" style="background: #e4e9ed;">
                            <form action="database/save.php" method="POST">                                
                                <div class="form-group">
                                    <label for="dir_name">Nombres</label>
                                    <input type="text" name="name" class="form-control" id="dir_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="dir_last_name">Apellidos</label>
                                    <input type="text" name="last_name" class="form-control" id="dir_last_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="dir_email">Correo electrónico</label>
                                    <input type="email" name="email" class="form-control" id="dir_email" aria-describedby="emailHelp" required>
                                </div>
                                <div class="form-group">
                                    <label for="dir_casa">Dirección</label>
                                    <input type="text" name="direccion" class="form-control" id="dir_casa" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Teléfono</label>
                                    <input type="tel" name="tel" class="form-control" id="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="dir_pass">Contraseña</label>
                                    <input type="password" name="pass" class="form-control" id="dir_pass" required>
                                </div>

                                <!--  Para administradores-->
                                <?php if ($tipo_id == '1') { ?>
                                    <input type="hidden" name="tipo_id" value="<?php echo $tipo_id ?>">
                                    <div class="form-group">
                                        <label for="select_tipo_usuario">Tipo de usuario</label>
                                        <select name="select_tipo_usuario" id="select_tipo_usuario" class="form-control">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="save" class="btn btn-primary" value="Registrar usuario"></input>
                                        <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
                                        </p>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <input type="submit" name="save" class="btn btn-primary" value="Registrarme"></input>
                                        <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
                                        <p class="pt-4  text-left">Si ya está registrado, haga click <a href="login.php">aquí.</a>
                                        </p>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>
</div>
<?php include('public/includes/footer.php') ?>