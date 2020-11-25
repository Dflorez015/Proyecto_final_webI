<?php
include('public/includes/header.php'); ?>
<div class="container-xl col-xl-8" style="padding-bottom : 25vh;">
    <div id="center-register">
        <div class="pt-2">
            <div class="form-group">
                <button name="validar" class="btn btn-success" data-toggle="modal" data-target="#crear">Crear requerimiento</button>
            </div>
            <div class="bg-dark text-white text-center">
                <h3>Requerimientos</h3>
            </div>
            <div class="d-block position-relative overflow-auto" style="height: 500px;">
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
                            <th scope="col">Id del técnico</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody class="text-center"  id="select_req_user"></tbody>
                </table>
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
                    <form action="database/guardar_solicitud.php?id=<?php $_SESSION['user_id'] ?>" method="POST">
                        <div class="form-group">
                            <label for="select_cat_user">Categoria principal</label>
                            <select name="select_cat_user" id="select_cat_user" class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="select_servicio_user">Tipo de servicio</label>
                            <select class="form-control" id="select_servicio_user" name="select_servicio_user" required>
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
</div>
<?php include('public/includes/footer.php') ?>