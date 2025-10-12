<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de destino</title>
</head>
<body>
    <h1>Datos recibidos:</h1>

    <?php
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $telefono = $_POST['telefono'] ?? '';

    // Guardar los datos en un fichero de texto
    $fichero = $nombre . ".txt";
    $contenido = "Nombre: $nombre - Teléfono: $telefono\n";

    // Escribir (añadir al final del fichero)
    file_put_contents($fichero, $contenido, FILE_APPEND);

    echo "<p>Datos guardados correctamente.</p>";
    echo "<hr>";
    echo "<h2>Contenido actual del fichero:</h2>";

    // Leer el fichero línea a línea
    if (file_exists($fichero)) {
        $lineas = file($fichero);
        foreach ($lineas as $linea) {
            echo htmlspecialchars($linea) . "<br>";
        }
    } else {
        echo "<p>No hay datos aún.</p>";
    }
    ?>
</body>
</html>