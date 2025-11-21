
<?php
// Crear la base de datos y las tablas necesarias
$host = 'localhost';
$db = 'cine';
$usuario = 'root';
$contrasena = '';


try {
    $pdo = new PDO("mysql:host=$host", $usuario, $contrasena);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Eliminar la base de datos existente
    $pdo->exec("DROP DATABASE IF EXISTS $db");
    echo "Base de datos '$db' eliminada si existía.<br>";

    // Crear la base de datos
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $db");
    echo "Base de datos '$db' creada exitosamente.<br>";

    // Seleccionar la base de datos
    $pdo->exec("USE $db");

    // Crear la tabla de usuarios
    $usuarios = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        usuario VARCHAR(50) NOT NULL,
        contrasena VARCHAR(50) NOT NULL
    )";
    $pdo->exec($usuarios);
    echo "Tabla 'usuarios' creada exitosamente.<br>";

    // Insertar usuarios
    $insertarUsuarios = "INSERT INTO usuarios (usuario, contrasena) VALUES
        ('admin', 'admin'),
        ('cliente1', '1234'),
        ('cliente2', '1234')";
    $pdo->exec($insertarUsuarios);
    echo "Usuarios insertados exitosamente.<br>";

    // Crear la tabla de peliculas
    $peliculas = "CREATE TABLE IF NOT EXISTS peliculas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        sillas_total INT NOT NULL,
        sillas_reservadas INT DEFAULT 0
    )";
    $pdo->exec($peliculas);
    echo "Tabla 'peliculas' creada exitosamente.<br>";

    // Crear la tabla de reservas
    $reservas = "CREATE TABLE IF NOT EXISTS reservas (
        id INT PRIMARY KEY,
        usuario_id INT NOT NULL,
        pelicula_id INT NOT NULL,
        sillas_reservadas INT NOT NULL,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
        FOREIGN KEY (pelicula_id) REFERENCES peliculas(id)
    )";
    $pdo->exec($reservas);
    echo "Tabla 'reservas' creada exitosamente.<br>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//Mostrar que se ha creado la base de datos y las tablas
echo "<br>La base de datos y las tablas se han creado correctamente.";

//Redirigir a la creacion de las peliculas después de 3 segundos
header("refresh:3;url=cine.php");
?>


