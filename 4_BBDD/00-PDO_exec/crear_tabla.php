<?php
require_once("conexion.php");
try {
 $sql = "CREATE TABLE IF NOT EXISTS aulas (
 id_aula VARCHAR(6) PRIMARY KEY,
 nombre_aula VARCHAR(25),
 numero_aula INT(2)
 )";
 $sql2 = "CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario VARCHAR(6) PRIMARY KEY,
    email VARCHAR(25)
    )";
 $conexion->exec($sql);
 $conexion->exec($sql2);
 echo "Tabla creada correctamente";
} catch (PDOException $e) {
 die("No se puede crear la tabla: " . $e->getMessage());
}
?>
