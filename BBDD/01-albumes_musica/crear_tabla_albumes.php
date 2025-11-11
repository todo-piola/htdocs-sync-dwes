<?php
require_once("conexion.php");
try {
 $sql = "CREATE TABLE albumes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    anio INT NOT NULL,
    sello VARCHAR(100),
    pais VARCHAR(50) DEFAULT 'Francia'
  )";

 $conexion->exec($sql);

 echo "Tabla creada correctamente";
} catch (PDOException $e) {
 die("No se puede crear la tabla: " . $e->getMessage());
}
?>
