<?php

session_start();

// Si se pulsa el boton de cerrar sesión, se acciona la variable logout...
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: control_acceso(login).php");
    exit;
}

// Si la variable de SESSION se manda desde el login, le asignamos ese valor a la variable local usuario
if($_SESSION['usuario']) {
     $usuario = $_SESSION['usuario'];
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso protegido</title>
    <style>
        body {
            color: <?php if($usuario === 'usuario') {
            echo 'green';
        } else {
            echo 'black'; // Color por defecto
        }?>;
        }
    </style>
</head>
<body>

    <h1> <?php if(isset($usuario)) echo 'Usuario: ' . $usuario ?> </h1>
    <form method="POST" action="">
        <button type="submit" name="logout">Cerrar Sesión</button>
    </form>
</body>
</html>