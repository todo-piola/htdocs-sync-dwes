<?php
require_once("conexion.php");
try {
 $sql = "UPDATE usuarios
 SET email = 'actualizo@gmail.com'
 WHERE id_usuario = 5";
 $cantidad = $conexion->exec($sql);
 echo "Se han actualizado $cantidad registros";
} catch (PDOException $e) {
 die("No se puede actualizar la base de datos: " . $e->getMessage());
}
?>
