<?php require "../db.php";
$query_categoria = "SELECT * FROM categoria";
$record_categoria = mysqli_query($conn, $query_categoria);
if(!isset($record_categoria)){
    die('Error al registrar');
}else{
    $categorias = '<option value="0">--Selecione una categoría--</option>';
while ($result_categoria = mysqli_fetch_array($record_categoria)) { 
    $categorias = $categorias.'<option value="'.$result_categoria['ID_categoria'].'">'.$result_categoria['Categoria_valor'].'</option>';
 }
 echo $categorias;   
}
?>
