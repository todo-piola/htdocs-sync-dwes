<?php
// Recibimos los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
$genero = $_POST['genero'] ?? '';
$pais = $_POST['pais'] ?? '';
$bio = $_POST['bio'] ?? '';

// Guardar los datos en un fichero de texto con este formato
// el nombre del fichero será el nombre introducido por el usuario + la extensión .txt
$fichero = $nombre . ".txt";
$contenido = "Nombre: $nombre | email: $email | Contraseña: $password | Fecha de nacimiento: $fecha_nacimiento | Genero: $genero | Pais: $pais  | Biografía: $bio";

// Escribir (añadir al final del fichero)
file_put_contents($fichero, $contenido, FILE_APPEND);

echo "<p>Datos guardados correctamente.</p>";
echo "<hr>";
echo "<h2>Contenido actual del fichero:</h2>";

// Leer el fichero línea a línea
// si el fichero existe... lee cada linea del fichero
if (file_exists($fichero)) {
    $lineas = file($fichero);
    foreach ($lineas as $linea) {
        echo htmlspecialchars($linea) . "<br>";
    }
} else {
    echo "<p>No hay datos aún.</p>";
}
?>