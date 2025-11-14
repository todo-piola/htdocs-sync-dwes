<?php
$server = "localhost";
$user = "root";
$password = "";

try {
    // Conexión al servidor (sin base de datos)
    $conexion = new PDO("mysql:host=$server;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Borrar base de datos si existe
    $conexion->exec("DROP DATABASE IF EXISTS chinese_man_db");
    echo "🗑️ Base de datos anterior eliminada correctamente.<br>";

    // Crear base de datos nueva
    $conexion->exec("CREATE DATABASE IF NOT EXISTS chinese_man_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    echo "✅ Base de datos 'chinese_man_db' creada correctamente.<br>";

    // Conectar ahora a la base de datos recién creada
    $conexion = new PDO("mysql:host=$server;dbname=chinese_man_db;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear tabla albumes
    $sql = "CREATE TABLE albumes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(100) NOT NULL,
        anio INT NOT NULL,
        sello VARCHAR(100),
        pais VARCHAR(50) DEFAULT 'Francia'
    )";

    $conexion->exec($sql);
    echo "🎵 Tabla 'albumes' creada correctamente.<br>";

} catch (PDOException $e) {
    die("❌ Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>CRUD - Chinese Man</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <h1> Chinese Man - Gestión de Álbumes</h1>
  <p>Selecciona una opción del menú:</p>
    <div class="menu">
        <form action="insertar.php" method="get"><button type="submit">I - Insertar</button></form>
        <form action="actualizar.php" method="get"><button type="submit">A - Actualizar</button></form>
        <form action="consultar.php" method="get"><button type="submit">C - Consultar</button></form>
        <form action="borrar.php" method="get"><button type="submit">B - Borrar</button></form>
    </div>
</body>
</html>
