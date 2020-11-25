<?php include('public/includes/header.php'); ?>
<div class="container-xl" style="padding-bottom : 25%;">
    <div id="center-register">
        <div class="card col-x1-4 col-lg-4 col-md-6 col-sm-12 col-10">
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

                </select>
            </div>
        </div>
        <div class="pt-2">
            <div class="bg-dark text-white text-center">
                <h3>Servicios</h3>
            </div>
            <div class="d-block position-relative overflow-auto" style="height: 500px;">
                <table class="table table-bordered ">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Servicio</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="select_servicio"></tbody>
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

<?php include('public/includes/footer.php'); ?>