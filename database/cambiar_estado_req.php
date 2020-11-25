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
                    $queryreq ="UPDATE requerimiento SET R_estado = '$estado', Usuario_soporte = '$id_soporte',
                    Fecha_atencion = '$fecha' 
                    WHERE ID_requerimiento = '$id'";
                    }else{
                        $queryreq ="UPDATE requerimiento SET R_estado = '$estado', Usuario_soporte = '$id_soporte',
                        Fecha_finalizacion = '$fecha' 
                        WHERE ID_requerimiento = '$id'";
                    }
                    $resul = mysqli_query($conn, $queryreq);
                    if(!isset($resul)){
                        die('Error al cambiar de estado');
                    }else{
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