<?php 
require '../db.php';
$query_tipo_usuarios = "SELECT * FROM tipo_usuario";
$record_categoria = mysqli_query($conn, $query_tipo_usuarios);
if(!isset($record_categoria)){
    die('Error al consultar ');
}else{
    $fila = "";
    while ($result_categoria = mysqli_fetch_array($record_categoria)) { 
        $fila.='<option value="'.$result_categoria['ID_tipo_usuario'].'">'.$result_categoria['Categoria'].' </option>';
    }
    echo $fila;
} 
?>