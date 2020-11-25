<?php 
require '../db.php';
if(isset($_POST['tipo_id'])){
    if($_POST['tipo_id'] == '1'){
        if(isset($_POST["save"])){
            # toma los valores del formulario           
            
            $name = $_POST["name"];
            $last_name = $_POST["last_name"];
            $pass = password_hash($_POST["pass"], PASSWORD_BCRYPT);
            $direccion = $_POST["direccion"];
            $tel = $_POST["tel"];
            $email = $_POST["email"];
            $tipo = $_POST["select_tipo_usuario"];
        
            $sql = "INSERT INTO usuario(Nombre, Apellido, Contrasenia, Direccion, Telefono, Correo, ID_Tipo_Usuario)
            VALUES ('$name', '$last_name', '$pass', '$direccion', '$tel', '$email', '$tipo')";
            $resul = mysqli_query($conn, $sql);
            if(!isset($resul)){
                die('Error al registrar');
            }else{header('location: ../admin_users.php');}
        }

    }
}else{
    if(isset($_POST["save"])){
        # toma los valores del formulario
        
        $name = $_POST["name"];
        $last_name = $_POST["last_name"];
        $pass = password_hash($_POST["pass"], PASSWORD_BCRYPT);
        $direccion = $_POST["direccion"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $tipo = '3';
    
        $sql = "INSERT INTO usuario(Nombre, Apellido, Contrasenia, Direccion, Telefono, Correo, ID_Tipo_Usuario)
        VALUES ('$name', '$last_name', '$pass', '$direccion', '$tel', '$email', '$tipo')";
        $resul = mysqli_query($conn, $sql);
        if(!isset($resul)){
            die('Error al registrar');
        }
        echo 'Aquí va lo del correo, para validar y eso';
    }
}
?>