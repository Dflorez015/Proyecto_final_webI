<?php
include('../db.php');
if(isset($_POST['categoria'])){
    $cat = $_POST['categoria'];
    $sql = "SELECT * FROM tipo_servicio WHERE ID_categoria_servicio = '$cat'";
    $result = mysqli_query($conn, $sql);
    
    $cadena = "";
    while($row = mysqli_fetch_row($result)){
        $cadena = $cadena.'<tr>'.'<td>'.$row[0].'</td>'.'<td>'.$row[2].'</td>'.'</tr>';
    }
    echo $cadena;
}
?>