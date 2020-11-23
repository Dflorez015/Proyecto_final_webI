<?php require 'db.php';
$act_desac = '';
include('public/includes/header.php'); ?>
<div class="container">
    <div id="center-register" style="padding-bottom: 25vh;">
        <div class="bg-dark text-white text-center">
            <h3>Usuarios</h3>
        </div>
        <div class="table-responsive-sm ">
            <table class="table table-bordered d-block"style="max-height: 500px;overflow-y: auto; " >
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Tipo de usuario</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody  ">
                    <?php  # petición de usuarios y categoria de usuario
                    $query = "SELECT ID, Nombre, Apellido, Telefono, Correo, Estado, ID_Tipo_Usuario FROM usuario";
                    $result_usuarios = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_usuarios)) { ?>
                        <?php
                        $query_tipo_usuarios = "SELECT Categoria FROM tipo_usuario WHERE ID_tipo_usuario=$row[ID_Tipo_Usuario]";
                        $record_categoria = mysqli_query($conn, $query_tipo_usuarios);
                        $result_categoria = mysqli_fetch_assoc($record_categoria);
                        ?>
                        <tr>
                            <td><?php echo $row['ID'] ?></td>
                            <td><?php echo $row['Nombre'] ?></td>
                            <td><?php echo $row['Apellido'] ?></td>
                            <td><?php echo $row['Telefono'] ?></td>
                            <td><?php echo $row['Correo'] ?></td>
                            <td><?php if ($row['Estado'] == '1') {
                                    echo 'Activo';
                                    $act_desac = 'Inactivar';
                                } else {
                                    echo 'Inactivo';
                                    $act_desac = 'Activar';
                                } ?></td>
                            <td><?php echo $result_categoria['Categoria'] ?></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-secondary" onclick="actualizar_id(<?php echo $row['ID'] ?>)">Modificar</a>
                                <a href="#" class="btn btn-danger" onclick="preguntar(<?php echo $row['ID'] ?>, <?php echo $row['Estado'] ?>)"><?php echo $act_desac ?></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include('public/includes/footer.php'); ?>