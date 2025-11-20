<?php
require_once("conexion.php");
try {
 $sql = "SELECT * FROM usuarios ORDER BY email";
 $declaracion = $conexion->query($sql);
 $usuarios = $declaracion->fetchAll(PDO::FETCH_ASSOC);
 foreach ($usuarios as $usuario) {
 echo $usuario["id_usuario"] . " - " . $usuario["email"] . "<br>";
 }
} catch (PDOException $e) {
 die("No se puede consultar la tabla: " . $e->getMessage());
}
?>