<?php require 'db.php';
include('public/includes/header.php'); ?>
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
                <label for="select_cat">Categorías</label>
                <select name="select_cat" id="select_cat" class="form-control" required>
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
                            <th scope="col">ID</th>
                            <th scope="col">Servicio</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" style="max-height: 500px;overflow-y: auto;" id="select_servicio"></tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- Modal categoría-->
    <div class="modal fade" id="modal_cat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Creación de categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="database/crear_cat.php" method="POST">
                        <label for="">Nombre de la categoría</label>
                        <input type="text" name="categoria" class="form-control" id="cat_name" required>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" name="crear">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal servicios-->
    <div class="modal fade" id="modal_serv" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Creación de servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return crear_serv()">
                        <label for="">Nombre del servicio</label>
                        <input type="text" class="form-control" id="serv_name" required>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?php include('public/includes/footer.php'); ?>