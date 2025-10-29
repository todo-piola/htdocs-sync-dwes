<?php
$host = 'localhost';
$dbname = 'facultad';
$usuario = 'root';
$clave = '';

try {
    // Cadena de conexión correcta
    $cadena_conexion = "mysql:host=$host;dbname=$dbname;charset=utf8";

    // Crear la conexión PDO
    $bd = new PDO($cadena_conexion, $usuario, $clave);

    // Configurar el modo de errores para verlos fácilmente
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión exitosa a la base de datos.";

    // Cerrar la conexión (se hace asignando null)
    $bd = null;

} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}
?>
