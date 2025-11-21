
<?php
$host = 'localhost';
$db = 'cine';
$usuario = 'root';
$contrasena = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $usuario, $contrasena);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>