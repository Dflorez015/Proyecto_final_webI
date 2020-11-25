<?php session_start();
require "../db.php";
if(isset($_GET['id'])){
    $id = $_GET['id']; // id del requerimiento
    if(isset($_GET['estado'])){
        $estado = $_GET['estado']; // estado del requerimeinto
        if(isset($_SESSION['tipo_id'])){ // nota: si la persona es un usuario puede cancelar antes que atienda el pedido un técnico
            $sesion_id = $_SESSION['tipo_id']; // coge la id del tipo de usuario que abrió sesión            
            if($estado == '1'){
                $queryreq ="UPDATE requerimiento SET R_estado = 4
                  WHERE ID_requerimiento = '$id'";
                  $resul = mysqli_query($conn, $queryreq);
                  if(!isset($resul)){
                      die('Error al cambiar de estado');
                  }else{
                      if($sesion_id == '2'){// Envía al usuario y al soporte a su respectiva página
                        header('location: ../consultar_requerimiento_soporte.php');                        
                    }
                  }
            }else{
                if($sesion_id == '3'){// Enviar mensaje al usuario si quiere cancelar un pedido en progreso
                    die('El requerimiento está en proceso, por favor contacte con nosotros para mayor información');
                }elseif($sesion_id == '2'){
                    $id_soporte = $_SESSION['user_id']; // coge la id del usuario soporte
                    date_default_timezone_set('America/Bogota');
                    $fecha = date("Y-m-d H:i:s");
                    if($estado == '2'){
                        // Cambia estado requerimiento a 2 (En proceso)
                    $queryreq ="UPDATE requerimiento SET R_estado = '$estado', Usuario_soporte = '$id_soporte',
                    Fecha_atencion = '$fecha' 
                    WHERE ID_requerimiento = '$id'";
                    }else{
                        // Cambia estado requerimiento a 3 (Finalizado)
                        $queryreq ="UPDATE requerimiento SET R_estado = '$estado', Usuario_soporte = '$id_soporte',
                        Fecha_finalizacion = '$fecha' 
                        WHERE ID_requerimiento = '$id'";
                    }
                        // Se ejecuta el cambio
                    $resul = mysqli_query($conn, $queryreq);
                    if(!isset($resul)){
                        die('Error al cambiar de estado');
                    }else{
                        //  Se envia un Email a usuario si se cambió el estado del requerimiento
                        $sql = "SELECT Correo, Nombre, Apellido, Valor_estado_req FROM usuario, requerimiento, estado_requerimiento
                        WHERE requerimiento.ID_requerimiento = '$id' AND requerimiento.Usuario_solicitante = usuario.ID AND requerimiento.R_estado = estado_requerimiento.ID_estado_requerimiento";
                        $res = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_row($res)){
                            $correo = $row[0];
                            $nombre = $row[1];
                            $apellido = $row[2];
                            $estado_v = $row[3];
                            $asunto = "Requerimiento solicitado";
                            $msg = "Hola ".$nombre." ".$apellido." la solicitud cuyo código es: ".$id." se encuentra: ".$estado_v;
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
                        header('location: ../consultar_requerimiento_soporte.php');
                    }
                }
            }
        }else{
            die('No se encontró una sesión');
        }
    }
}else{
    die('Error al conectar con el servidor');
}
?>