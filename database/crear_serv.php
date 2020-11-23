<?php 
require '../db.php';
if (isset($_GET["id_cat"]) && isset($_GET["valor"])) {
    $id_cat = $_GET["id_cat"];
    $valor = $_GET["valor"];
    if ($id_cat != '0') {
        $sql = "INSERT INTO tipo_servicio(ID_categoria_servicio, Servicio)
            VALUES ('$id_cat', '$valor')";
        $resul = mysqli_query($conn, $sql);
        if (!isset($resul)) {
            die('Error al registrar');
        } else {
            header('location: ../categoria_servicio.php');
        }
    } else {print_r('<div class="alert alert-danger" role="alert"> Escoja una categoría
        </div>');
        header('location: ../categoria_servicio.php');
    }
}
