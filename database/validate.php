<?php 
session_start();

require '../db.php';

$email = $_POST["email"];
if(!empty($email)){
    $sql = "SELECT  ID, Correo, Contrasenia, Estado,ID_Tipo_Usuario FROM usuario WHERE Correo= '$email'";
    $records = mysqli_query($conn, $sql);
    $results = mysqli_fetch_assoc($records);
    if(count($results)>0 && password_verify($_POST['pass'], $results['Contrasenia']) && $results['Estado'] == '1'){
        $_SESSION['user_id'] = $results['ID'];
        $_SESSION['tipo_id'] = $results['ID_Tipo_Usuario'];
        header('location: ../index.php');
    }else{
        if($results['Estado'] == '1'){
            $_SESSION['error_validation'] = 'Clave o correo invalido. Por favor vuelva a ingresar los';
        }else{
            $_SESSION['error_validation'] = 'Su cuenta se encuentra inactiva.';
        }
        
        header('location: ../login.php');
    }
    mysqli_free_result($records);

}
?>