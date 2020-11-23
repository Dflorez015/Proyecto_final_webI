<?php
require '../db.php';
if(isset($_POST["save"])){
    # toma los valores del formulario
    $id = $_POST['id'];
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $direccion = $_POST["direccion"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $tipo = $_POST["select_box_tipo_usuario"];
    $estado = $_POST["select_box_estado"];

    $query = "UPDATE usuario SET  Nombre = '$name', Apellido = '$last_name', Direccion = '$direccion',
     Telefono = '$tel', Correo = '$email', ID_Tipo_Usuario = '$tipo', Estado =  '$estado' WHERE ID= '$id'";
    $resul = mysqli_query($conn, $query);
    if(!isset($resul)){
        die('Error al registrar');
    }
    header('location: ../admin_users.php');
}
?>