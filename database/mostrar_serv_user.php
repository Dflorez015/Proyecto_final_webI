<?php
include('../db.php');
if(isset($_POST['categoria'])){
    $cat = $_POST['categoria'];
    $sql = "SELECT * FROM tipo_servicio WHERE ID_categoria_servicio = '$cat'";
    $result = mysqli_query($conn, $sql);
    
    $cadena = "<option>--Selecione un servicio--</option>";
    while($row = mysqli_fetch_row($result)){
        $cadena = $cadena.'<option value="'.$row[0].'">'.$row[2].'</option>';
    }
    echo $cadena;
}
?>