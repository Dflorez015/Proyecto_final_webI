<?php
require "../db.php";
$query = "SELECT usuario.ID, usuario.Nombre, usuario.Apellido, usuario.Telefono, usuario.Correo, usuario.Estado, tipo_usuario.Categoria FROM usuario, tipo_usuario WHERE usuario.ID_tipo_usuario= tipo_usuario.ID_Tipo_Usuario ";
$result_usuarios = mysqli_query($conn, $query);
if(!isset($result_usuarios)){
    die('Error al consultar');
}else{
    $fila = "";
    while ($row = mysqli_fetch_array($result_usuarios)) {
        $estado = '';
        $act_desac = '';
        if ($row['Estado'] == '1') {
            $estado = 'Activo';
            $act_desac = 'Inactivo';
        } else {
            $estado = 'Inactivo';
            $act_desac = 'Activar';
        }
        $fila = $fila.'<tr>'.
        '<td>'.$row['ID'].'</td>'.
        '<td>'.$row['Nombre'].'</td>'.
        '<td>'.$row['Apellido'].'</td>'.
        '<td>'.$row['Telefono'].'</td>'.
        '<td>'.$row['Correo'] .'</td>'.
        '<td>'.$estado.'</td>'.
        '<td>'.$row['Categoria'].'</td>'.
        '<td class="text-center">'.
        '<a href="#" class="btn btn-secondary" onclick="actualizar_id('.$row['ID'].')">Modificar</a>'.
        '<a href="#" class="btn btn-danger" onclick="preguntar('.$row['ID'].','.$row['Estado'].')">'.$act_desac.'</a>'
        .'</td>'.
        '</tr>';

    }
    echo $fila;
}
?>
