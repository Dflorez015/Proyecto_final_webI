<?php session_start();
require '../db.php';
$query = "SELECT ID_requerimiento,Servicio, Categoria_valor, Valor_estado_req,
 Descripcion_req, Ubicacion_req, Fecha_creacion, Fecha_atencion, Fecha_finalizacion, ID_estado_requerimiento, Usuario_soporte
  FROM requerimiento, categoria, tipo_servicio, estado_requerimiento
   WHERE requerimiento.Usuario_solicitante = $_SESSION[user_id] 
   AND requerimiento.R_estado = estado_requerimiento.ID_estado_requerimiento 
   AND requerimiento.R_servicio = tipo_servicio.ID_servicio 
   AND categoria.ID_categoria = requerimiento.R_categoria";
$result_usuarios = mysqli_query($conn, $query);
if(!isset($result_usuarios)){
    die('Error al buscar los requerimientos');
}else{
    $fila = '';
    while ($row = mysqli_fetch_row($result_usuarios)) {
        $cancelar_btn = "";
        if($row[9] == '1'){ // Si el requerimiento solo está reportado el usuario lo puede cancelar
            $cancelar_btn = '<a href="database/cambiar_estado_req.php?id='.$row[0].'&estado='.$row[9].'" class="btn btn-secondary">Cancelar</a>';
        }
        $fila = $fila.
        '<tr>'.
        '<td>'. $row[0].'</td>'.
        '<td>'. $row[1].'</td>'.
        '<td>'. $row[2].'</td>'.
        '<td>'. $row[3].'</td>'.
        '<td>'. $row[4].'</td>'.
        '<td>'. $row[5].'</td>'.
        '<td>'. $row[6].'</td>'.
        '<td>'. $row[7].'</td>'.
        '<td>'. $row[8].'</td>'.
        '<td>'. $row[10].'</td>'.
        '<td class="text-center">'.
        $cancelar_btn.
        '</td>'.
        '</tr>';
     }
     echo $fila;

}?>