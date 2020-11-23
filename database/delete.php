<?php
include('../db.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $estado = $_GET['estado'];
    if($estado == '1'){
        $query = "UPDATE usuario SET Estado = '0' WHERE ID= $id";
    }else{
        $query = "UPDATE usuario SET Estado = '1' WHERE ID= $id";
    }
    
    $result = mysqli_query($conn, $query);
    if(!$result){
        die('Consulta fallida.');
    }
    header('location: ../admin_users.php');
}
?>
