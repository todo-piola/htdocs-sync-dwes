<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "chinese_man_db";
try {
    $conexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "!!! Conexión exitosa !!!" . "<br>" ;
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

?>