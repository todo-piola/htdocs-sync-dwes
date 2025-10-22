<?php
session_start(); // !!!! Importante para acceder y guardar variables de sesión !!!!

// Comprobamos si viene la película desde el formulario anterior
if (isset($_POST['pelicula'])) {
    $_SESSION['pelicula'] = $_POST['pelicula']; // Guardamos la elección en la sesión
}

$pelicula = $_SESSION['pelicula'] ?? 'No seleccionada';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elige tu butaca</title>
</head>
<body>
    <h1>Selecciona tu butaca para la película: <?= htmlspecialchars($pelicula) ?></h1>
    <form action="confirmar.php" method="post">
        <label>Butaca:
            <select name="butaca">
                <option value="A1">A1</option>
                <option value="A2">A2</option>
                <option value="B1">B1</option>
                <option value="B2">B2</option>
            </select>
        </label>
        <br><br>
        <input type="submit" value="Confirmar selección">
    </form>
</body>
</html>