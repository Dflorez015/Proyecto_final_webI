<?php include('db.php'); ?>
<?php include('public/includes/header.php');?>

<div class="container">
    <div class="div-center">
        <div class="card text-center shadow-lg  mb-5 bg-white rounded " id="login_cont">
            <div class="card-header bg-dark text-white">
            <h3>DETALLE DE SU SOLICITUD</h3>
            </div>
            <div class="card-body text-dark ">
                <p class="card-text">
                <?php  # petición de usuarios y categoria de usuario
                    $query = "SELECT ID_requerimiento, Usuario_soporte, R_servicio, R_categoria, R_estado, Descripcion_req, Ubicacion_req, Fecha_creacion, Fecha_atencion, Fecha_finalizacion FROM requerimiento";
                    $result_usuarios = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_usuarios)) { ?>
                        <b>Identificación:</b> <?php echo $row['ID_requerimiento'] ?><br>
                        <b>Soporte:</b> <?php echo $row['Usuario_soporte'] ?><br>
                        <b>Servicios solicitado:</b> <?php echo $row['R_servicio'] ?><br>
                        <b>Categoria:</b> <?php echo $row['R_categoria'] ?><br>
                        <b>Descripcion de la solicitud:</b> <?php echo $row['Descripcion_req'] ?><br>
                        <b>Ubicación: </b> <?php echo $row['Ubicacion_req'] ?><br>
                        <b>Fecha de creación:</b> <?php echo $row['Fecha_creacion'] ?><br>
                        <b>Fecha de atención:</b> <?php echo $row['Fecha_atencion'] ?><br>
                        <b>Fecha de finalización:</b> <?php echo $row['Fecha_finalizacion'] ?><br>
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
</div>

<?php include('public/includes/footer.php');?>
