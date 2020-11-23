<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'mesa_de_servicios'
);
$conn->set_charset("utf8");
if(!isset($conn)){
    die('Error de conexión');
}

?>