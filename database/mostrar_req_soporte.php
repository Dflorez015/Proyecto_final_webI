<?php
include('../db.php');
if(isset($_POST['categoria'])){
    $cat = $_POST['categoria'];
    $sql = "SELECT requerimiento.ID_requerimiento, requerimiento.Descripcion_req, requerimiento.Ubicacion_req
    ,categoria.Categoria_valor, tipo_servicio.Servicio,
     estado_requerimiento.Valor_estado_req, usuario.Nombre, usuario.Apellido
      FROM requerimiento, estado_requerimiento, usuario, tipo_servicio, categoria
       WHERE tipo_servicio.ID_categoria_servicio = '$cat' 
       AND categoria.ID_categoria = tipo_servicio.ID_categoria_servicio 
       AND requerimiento.R_servicio = tipo_servicio.ID_servicio
       AND requerimiento.R_categoria = categoria.ID_categoria
       AND requerimiento.R_estado = estado_requerimiento.ID_estado_requerimiento
       AND requerimiento.Usuario_solicitante = usuario.ID
       ";
    $result = mysqli_query($conn, $sql);
    
    $cadena = "";
    while($row = mysqli_fetch_row($result)){
        $cadena = $cadena.'<tr>'.'<td>'.$row[0].'</td>'.'<td>'.$row[1].'</td>'.'<td>'.$row[2].'</td>'.'<td>'.$row[3].'</td>'.'<td>'.$row[4].'</td>'.'<td>'.$row[5].'</td>'.'<td>'.$row[6].'</td>'.'<td>'.$row[7].'</td>'.'</tr>';
    }
    echo $cadena;
}
?>