
<?php
$host = 'localhost';
$db = 'cine';
$usuario = 'root';
$contrasena = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $usuario, $contrasena);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insertar películas
    $insertarPeliculas = "INSERT INTO peliculas (nombre, sillas_total) VALUES
        ('Pelicula1', 100),
        ('Pelicula2', 80),
        ('Pelicula3', 120)";
    $pdo->exec($insertarPeliculas);
    echo "Películas insertadas exitosamente.<br>";
    header("refresh:3;url=login.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
