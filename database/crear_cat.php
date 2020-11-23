<?php 
require '../db.php';
$id_cat = '';
if(isset($_POST["crear"])){
    $id_cat = $_POST["categoria"];
    $sql = "INSERT INTO categoria(Categoria_valor)
            VALUES ('$id_cat')";
    $resul = mysqli_query($conn, $sql);
    if(!isset($resul)){
        die('Error al registrar');
    }else{
        header('location: ../categoria_servicio.php');
    }
}
?>