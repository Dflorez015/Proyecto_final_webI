<?php include('public/includes/header.php'); ?>
<div class="container-xl" style="padding-bottom: 25%">
    <div id="center-register">
        <div class="card col-x1-4 col-lg-4 col-md-6 col-sm-12 col-10">
            <div id="alerta_cero"></div>
            <div class="form-group">
                <label for="select_cat_soporte">Categorías</label>
                <select name="select_cat_soporte" id="select_cat_soporte" class="form-control" required>
                    <option value="0">--Selecione una categoría--</option>                    
                </select>
            </div>
        </div>
        <div class="pt-2">
            <div class="bg-dark text-white text-center">
                <h3>Servicios</h3>
            </div>
            <div class="d-block position-relative overflow-auto" style="height: 500px;">
                <table class="table table-bordered">
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
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="text-center"  id="select_servicio_soporte"></tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php include('public/includes/footer.php'); ?>