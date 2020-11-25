<?php
include('../db.php');
if(isset($_POST['categoria'])){
    $cat = $_POST['categoria'];
    $sql = "SELECT requerimiento.ID_requerimiento, requerimiento.Descripcion_req, requerimiento.Ubicacion_req
    ,categoria.Categoria_valor, tipo_servicio.Servicio,
     estado_requerimiento.Valor_estado_req, usuario.Nombre, usuario.Apellido, estado_requerimiento.ID_estado_requerimiento
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
    $accion = "";
    while($row = mysqli_fetch_row($result)){ // recordar que el estado 1 en la función cambiar_estado_req hace que se cancele el requerimiento
        if($row[8] != 4 && $row[8] != 3){ // con esto no se imprimen los requerimientos cancelados (si no quiere que se listen los requerimientos atendidos el condicional sería 'if($row[8] != 4 && $row[8] != 3){  ')
            if($row[8] == 2){ // Si está el requerimiento en proceso el botón pasa a tener el estado en 3
                $accion = "finalizar servicio";
                $row[8] = '3';
            }elseif($row[8] == 1){// Si está el requerimiento reportado el botón pasa a tener el estado en 2
                $row[8] = '2';
                $accion = "Atender servicio";
            }
            $cadena = $cadena.'<tr>'.'<td>'.$row[0].'</td>'.'<td>'.$row[1].'</td>'.'<td>'.$row[2].'</td>'.'<td>'.$row[3].'</td>'.'<td>'.$row[4].'</td>'.'<td>'.$row[5].'</td>'.'<td>'.$row[6].'</td>'.'<td>'.$row[7].'</td>'.
            '<td> <a href="database/cambiar_estado_req.php?id='.$row[0].'&estado='.$row[8].'" class="btn btn-secondary">'.$accion.'</a>'.
            '<a href="database/cambiar_estado_req.php?id='.$row[0].'&estado=1" class="btn btn-danger">Cancelar</a>'.//pasa el estado 1 ya que este en la función a la que se envia cancela el requerimiento
            '</td>'.            
            '</tr>';
        }
    }
    echo $cadena;
}
?>