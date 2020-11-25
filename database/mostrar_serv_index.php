<?php require "../db.php";
 $query_serv = "SELECT * FROM tipo_servicio";
$record_serv = mysqli_query($conn, $query_serv);
if(!isset($record_serv)){
    die('Error al registrar');
}else{
    $categorias = '';
while ($result_serv = mysqli_fetch_array($record_serv)) { 
    $categorias = $categorias.'<tr>'.'<td>'.$result_serv['Servicio'].'</td>'.'</tr>';
 }
 echo $categorias;   
}
?>