<?php include('db.php'); ?>
<?php include('public/includes/header.php'); ?>
<div class="container" style="padding-top: 15vh; padding-bottom: 20vh;">
    <div class="bg-white p-5 row">
        <div class="col-x1-6 col-lg-6 col-md-6 col-sm-12 col-12" style="text-align: center">
            <img src="public/imagenes/index.jpg" class="embed-responsive-16by9" width="360">
        </div>
        <div class="col-x1-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h1 style="text-align: center">Last Hour Associated</h1>
            <hr>
            <div>
                <h3>Solicitud de mantenimiento</h3>
                <p>
                    Usted está ingresando al servicio de mantenimiento de Last Hour Associated.<br>
                    Por este medio podrá realizar la solicitud de mantenimiento y un encargado se hará cargo de su solicitud lo más pronto posible.<br>
                    Los siguientes servicios se encuentran disponibles: <br>
                    <?php $query_categoria = "SELECT * FROM categoria";
                    $record_categoria = mysqli_query($conn, $query_categoria);
                    while ($result_categoria = mysqli_fetch_array($record_categoria)) { ?>
                        <option value="<?php echo $result_categoria['ID_categoria'] ?>"><?php echo $result_categoria['Categoria_valor'] ?></option>
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>

</div>

<?php include('public/includes/footer.php'); ?>