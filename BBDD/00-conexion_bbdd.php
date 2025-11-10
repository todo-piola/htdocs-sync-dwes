<?php
$server = "localhost";
$user = "root";
$contrasena = "";
$basededatos = "escuela";

/* Definir la cx */
$cx = mysqli_connect($server, $user, $contrasena, $basededatos);

/* Comprobar conexión */
if (!$cx) {
    die(sprintf("No se puede conectar a la base de datos: [%d] %s",
    mysqli_connect_errno(), mysqli_connect_error()));
}

/* Definir la creacion de la TABLA */
$sql = "CREATE TABLE IF NOT EXISTS aulas (
    id_aula VARCHAR(6) PRIMARY KEY,
    nombre_aula VARCHAR(25),
    numero_aula INT(2)
)";

/* Crear la TABLA */
if (!mysqli_query($cx, $sql)) {
    die(sprintf("No se puede crear la tabla: [%d] %s",
    mysqli_errno($cx), mysqli_error($cx)));
}


$actualiza = "UPDATE aulas
              SET nombre_aula = 'Aula de Tecnología'
              WHERE numero_aula = 12";

if (!mysqli_query($cx, $actualiza)) {
    die(sprintf("❌ No se puede actualizar la base de datos: [%d] %s",
        mysqli_errno($cx), mysqli_error($cx)));
}

//  (OPCIONAL) ELIMINAR LA TABLA "aulas"
if (!mysqli_query($cx, "DROP TABLE IF EXISTS aulas")) {
    die(sprintf("❌ No se puede eliminar la tabla: [%d] %s",
        mysqli_errno($cx), mysqli_error($cx)));
} else {
    echo " Tabla 'aulas' eliminada correctamente.<br>";
}

/* Cerrar la conexión */
mysqli_close($cx);
?>