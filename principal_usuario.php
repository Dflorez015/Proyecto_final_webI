<?php require 'db.php';
include('public/includes/header.php'); ?>
<div class="container">
    <div class="div-center">
        <div class="card text-center shadow-lg  mb-5 bg-white rounded " id="login_cont">
            <div class="card-header bg-dark text-white">
                Usuario
            </div>
            <div class="card-body text-dark">
                <p class="card-text">
                    <div class="form-group">
                        <button name="validar" class="btn btn-success" data-toggle="modal" data-target="#crear">Crear</button>
                        <a href="consultar.php" role="button" class="btn btn-warning">Consultar</a>
                    </div>
                </p>
            </div>
        </div>
    </div>

    <!-- Modal reg requerimiento -->
    <div class="modal fade" id="crear" tabindex="-1" aria-labelledby="crearlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearlabel">Registrar requerimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="database/guardar_solicitud.php?id=<?php $_SESSION['user_id']?>" method="POST">
                        <div class="form-group">
                            <label for="select_cat_user">Categoria principal</label>
                            <select name="select_cat_user" id="select_cat_user" class="form-control" required>
                                <option value="0">--Selecione una categoría--</option>

                                <?php $query_categoria = "SELECT * FROM categoria";
                                $record_categoria = mysqli_query($conn, $query_categoria);
                                while ($result_categoria = mysqli_fetch_array($record_categoria)) { ?>
                                    <option value="<?php echo $result_categoria['ID_categoria'] ?>"><?php echo $result_categoria['Categoria_valor'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="select_servicio_user">Tipo de servicio</label>
                            <select class="form-control" id="select_servicio_user" name="select_servicio_user" required>
                                <option>--Selecione un servicio--</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ds">Descripción de la solicitud</label>
                            <input type="text" class="form-control" id="ds" name="ds" placeholder="Descripción de la solicitud" required>
                        </div>

                        <div class="form-group">
                            <label for="ue">Ubicación dentro de la empresa</label>
                            <input type="text" class="form-control" id="ue" name="ue" placeholder="Ubicación dentro de la empresa" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('public/includes/footer.php') ?>