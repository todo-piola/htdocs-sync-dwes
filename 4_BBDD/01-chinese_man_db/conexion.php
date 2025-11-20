<?php
$server = "localhost";
// Usuario con permisos para acceder a la base de datos
$user = "root";
$password = "";
$db = "chinese_man_db";
try {
    $conexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password);
    // Esto hace que PDO lance excepciones en caso de error
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "!!! Conexión exitosa !!!" . "<br>" ;
} catch (PDOException $e) {
    // Si hay algún fallo, se detiene la ejecución y se muestra el error
    die("Conexión fallida: " . $e->getMessage());
}

?>