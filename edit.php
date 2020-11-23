<?php include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>
<?php include('public/includes/header.php'); ?>

<div class="container">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Modificando usuario</h5>
            </div>
            <div class="modal-body">
                <?php
                $query = "SELECT *  FROM usuario, tipo_usuario WHERE usuario.ID_Tipo_Usuario = tipo_usuario.ID_tipo_usuario AND usuario.ID = $id";
                $result_usuarios = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result_usuarios);
                ?>
                <!-- Datos del usuario -->
                <form action="database/edition.php" method="POST">
                    <input type="hidden" name="id" value=<?php echo $row['ID']?>>
                    <div class="form-group">
                        <label for="dir_name">Nombres</label>
                        <input type="text" name="name" class="form-control" id="dir_name" value=<?php echo $row['Nombre'] ?> required>
                    </div>
                    <div class="form-group">
                        <label for="dir_last_name">Apellidos</label>
                        <input type="text" name="last_name" class="form-control" id="dir_last_name" value=<?php echo $row['Apellido'] ?> required>
                    </div>
                    <div class="form-group">
                        <label for="dir_email">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" id="dir_email" aria-describedby="emailHelp" value=<?php echo $row['Correo'] ?> required>
                    </div>
                    <div class="form-group">
                        <label for="dir_casa">Dirección</label>
                        <input type="text" name="direccion" class="form-control" id="dir_casa" value=<?php echo $row['Direccion'] ?> required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="tel" name="tel" class="form-control" id="phone" value=<?php echo $row['Telefono'] ?> required>
                    </div>

                    <div class="form-group">
                        <label for="select_tipo_usuario">Tipo de usuario</label>
                        <select name="select_box_tipo_usuario" id="select_tipo_usuario" class="form-control">
                            <?php #Seleccionar y listar el tipo de usuario
                            $query_tipo_usuarios = "SELECT * FROM tipo_usuario";
                            $record_categoria = mysqli_query($conn, $query_tipo_usuarios);
                            while ($result_categoria = mysqli_fetch_array($record_categoria)) { ?>
                                <?php if ($row['ID_Tipo_Usuario'] == $result_categoria['ID_tipo_usuario']) { ?>
                                    <option value="<?php echo $result_categoria['ID_tipo_usuario'] ?>" selected="selected"><?php echo $result_categoria['Categoria'] ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $result_categoria['ID_tipo_usuario'] ?>"><?php echo $result_categoria['Categoria'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="select_estado">Estado</label>
                        <select name="select_box_estado" id="select_estado" class="form-control">
                            <?php if ($row['Estado'] == '1') { ?>
                                <option value="1" selected="selected">Activo</option>
                                <option value="0">Inactivo</option>
                            <?php } else { ?>
                                <option value="0" selected>Inactivo</option>
                                <option value="1">Activo</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick=" regresar_admin_users()">Cerrar</button>
                            <input type="submit" name="save" class="btn btn-primary" value="Guardar cambios"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('public/includes/footer.php'); ?>