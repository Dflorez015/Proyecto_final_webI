<?php require 'db.php';
$act_desac = '';
include('public/includes/header.php'); ?>
<div class="container">
    <div id="center-register" style="padding-bottom: 25vh;">
        <div class="bg-dark text-white text-center">
            <h3>REPORTE</h3>
        </div>
        <div class="table-responsive-sm ">
            <table class="table table-bordered">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Fecha creación</th>
                        <th scope="col">Fecha atención</th>
                        <th scope="col">Fecha finalización</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  # petición de usuarios y categoria de usuario
                    $query = "SELECT ID_requerimiento, Servicio, Categoria_valor, Valor_estado_req, Descripcion_req, Ubicacion_req, Fecha_creacion, Fecha_atencion, Fecha_finalizacion FROM requerimiento, categoria, tipo_servicio, estado_requerimiento WHERE requerimiento.Usuario_solicitante = $_SESSION[user_id] AND requerimiento.R_estado = estado_requerimiento.ID_estado_requerimiento AND requerimiento.R_servicio = tipo_servicio.ID_servicio AND categoria.ID_categoria = requerimiento.R_categoria";
                    $result_usuarios = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_row($result_usuarios)) { ?>
                        <tr>
                            <td><?php echo $row[0] ?></td>
                            <td><?php echo $row[1] ?></td>
                            <td><?php echo $row[2] ?></td>
                            <td><?php echo $row[3] ?></td>
                            <td><?php echo $row[4] ?></td>
                            <td><?php echo $row[5] ?></td>
                            <td><?php echo $row[6] ?></td>
                            <td><?php echo $row[7] ?></td>
                            <td><?php echo $row[8] ?></td>

                            <td class="text-center">
                                <a href="database/cambiar_estado_req.php?id=<?php $row[0]?>" class="btn btn-secondary">Cancelar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include('public/includes/footer.php'); ?>