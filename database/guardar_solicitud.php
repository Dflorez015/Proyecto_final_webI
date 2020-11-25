<?php session_start();
    require '../db.php';
    if(isset($_POST["guardar"]) && isset($_SESSION['user_id'])){
        # toma los valores del formulario        
        $usuario_sol = $_SESSION['user_id']; //id del usuario que tiene la sesion
        $servicio = $_POST["select_servicio_user"];
        $categoria = $_POST["select_cat_user"];
        $descripcion =  $_POST["ds"];
        $ubicacion =  $_POST["ue"];

        $sql = "INSERT INTO requerimiento(Usuario_solicitante, R_servicio, R_categoria, Descripcion_req, Ubicacion_req)
        VALUES ('$usuario_sol',  '$servicio', '$categoria',  '$descripcion', '$ubicacion')";
        $resul = mysqli_query($conn, $sql);
        if(!isset($resul)){
            die('Error al registrar');
        }else{
            header('location: ../principal_usuario.php');
        }
    }
?>