<?php
require_once("conexion.php");
try {
 $sql = "CREATE TABLE IF NOT EXISTS aulas (
 id_aula VARCHAR(6) PRIMARY KEY,
 nombre_aula VARCHAR(25),
 numero_aula INT(2)
 )";
 $conexion->exec($sql);
 echo "Tabla creada correctamente";
} catch (PDOException $e) {
 die("No se puede crear la tabla: " . $e->getMessage());
}
?>
