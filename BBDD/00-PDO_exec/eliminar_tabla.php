<?php
require_once("conexion.php");
try {
 $sql = "DROP TABLE aulas";
 $conexion->exec($sql);
 echo "Tabla eliminada correctamente";
} catch (PDOException $e) {
 die("No se puede eliminar la tabla: " . $e->getMessage());
}
?>