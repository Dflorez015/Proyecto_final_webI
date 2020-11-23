<?php include('db.php'); ?>
<?php include('public/includes/header.php'); ?>
<div class="container" style="height: 80vh;padding-bottom : 25vh;">
    <div id="center-register">
        <div class="card col-3">
            <div id="alerta_cero"></div>
            <div class="form-group">
                <input type="submit" name="crear" class="btn btn-dark" value="Crear categoría" data-toggle="modal" data-target="#modal_cat"></input>
            </div>
            <div class="form-group">
                <input type="submit" name="crear" class="btn btn-dark" value="Crear servicio" data-toggle="modal" data-target="#modal_serv"></input>
            </div>
            <div class="form-group">
                <label for="select_cat_soporte">Categorías</label>
                <select name="select_cat_soporte" id="select_cat_soporte" class="form-control" required>
                    <option value="0">--Selecione una categoría--</option>

                    <?php $query_categoria = "SELECT * FROM categoria";
                    $record_categoria = mysqli_query($conn, $query_categoria);
                    while ($result_categoria = mysqli_fetch_array($record_categoria)) { ?>
                        <option value="<?php echo $result_categoria['ID_categoria'] ?>"><?php echo $result_categoria['Categoria_valor'] ?></option>
                    <?php } ?>

                </select>
            </div>
        </div>
        <div style="padding-top: 2vh;">
            <div class="bg-dark text-white text-center">
                <h3>Servicios</h3>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-bordered lista_limite">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Servicio</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" style="max-height: 500px;overflow-y: auto;" id="select_servicio_soporte"></tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php include('public/includes/footer.php'); ?>