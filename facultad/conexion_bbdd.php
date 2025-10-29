<?php
$host = 'localhost';
$dbname = 'facultad';
$usuario = 'root';
$clave = '';

try {
    // 1️⃣ Conectamos con PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $clave);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h3>Conexión exitosa a la base de datos</h3>";

    // 2️⃣ Creamos la consulta SQL
    $sql = "SELECT nombre FROM alumno WHERE nombre LIKE 'An%' ";

    // 3️⃣ Ejecutamos la consulta
    $resultado = $conexion->query($sql);

    // 4️⃣ Mostramos los resultados
    echo "<h4>Listado de alumnos:</h4>";
    echo "<ul>";

    foreach ($resultado as $fila) {
        echo "<li>" . $fila['nombre']; #. " " . $fila['apellido1'] . " - " . $fila['direccion'] . "</li>";
    }

    echo "</ul>";

    // 5️⃣ Cerramos la conexión
    $conexion = null;

} catch (PDOException $e) {
    echo "❌ Error con la base de datos: " . $e->getMessage();
}
?>