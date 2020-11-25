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
            $query_correo = "SELECT Correo, Nombre, Apellido, ID_requerimiento FROM usuario, requerimiento
             WHERE ID = '$usuario_sol' AND requerimiento.Usuario_solicitante = usuario.ID ORDER BY requerimiento.Fecha_creacion DESC LIMIT 1 ";
            $res_correo = mysqli_query($conn, $query_correo);            
            while($row = mysqli_fetch_row($res_correo)){
                $correo = $row[0];
                $nombre = $row[1];
                $apellido = $row[2];
                $codigo = $row[3];
                $asunto = "Requerimiento solicitado";
                $msg = "Descripción del requerimiento:".$descripcion."\r\n"."Ubicación: ".$ubicacion."\r\n"."Código: ".$codigo;
                $header = "From: Last_Hour_Associate@gmail.com". "\r\n";
                $header.= "Reply-To: Last_Hour_Associate@gmail.com"."\r\n";
                $header.= "X-Mailer: PHP/". phpversion();
                $mail = mail($correo, $asunto,$msg, $header);
                if($mail){
                    header('location: ../principal_usuario.php');
                }else{
                    die('Error al mandar el mensaje a su correo');
                }                
            }
        }
    }
?>