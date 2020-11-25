<?php include('public/includes/header.php'); ?>
<div class="container-xl" style="padding-bottom: 25%;">
    <div id="center-register">
        <div class="bg-dark text-white text-center">
            <h3>Usuarios</h3>
        </div>
        <div class="d-block position-relative overflow-auto" style="height: 500px;">
            <table class="table table-bordered">
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
                <tbody id="lista_user_admin">
                    
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include('public/includes/footer.php'); ?>