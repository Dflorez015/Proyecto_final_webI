<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet " href="css/style.css">
    <title>Mesa de servicios para las solicitudes</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark  shadow" role="navigation" style="background: #8BC34A;">

            <a href="index.php" class="navbar-brand">Incautos services</a>
            <button class="navbar-toggler navbar-toggler-rigth" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNavAltMarkup">
                <ul class="navbar-nav ml-auto" id="ulMenuVar">
                    <?php # Opciones para cada tipo de usuario 
                    if (isset($_SESSION['user_id'])) { ?>
                        <?php if ($_SESSION['tipo_id'] == '3') { ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="database/crear_solicitud.php">Crear</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="database/consultar_solicitud.php">Consultar</a>
                            </li>
                        <?php } elseif ($_SESSION['tipo_id'] == '2') { ?>
                        <?php } else { ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="admin_users.php">Usuarios</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="registro.php?tipo_id=1">Crear usuarios</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="categoria_servicio.php">Categorías y tipos de servicios</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="database/logout.php">Salir</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="login.php">Login </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="registro.php">Registro</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        </nav>
    </header>