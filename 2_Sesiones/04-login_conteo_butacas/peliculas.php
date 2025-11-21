<?php
session_start();

// Si el usuario no ha iniciado sesión, lo redirigimos
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}


$aforo_total = 10; // Máximo de sillas por película
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pelicula = $_POST['pelicula'];
    $sillas_deseadas = intval($_POST['sillas']);

    if ($sillas_deseadas <= 0) {
        $mensaje = "Debes reservar al menos una silla.";
    } else {
        $ocupadas = $_SESSION['butacas'][$pelicula];
    }
    
    if ($ocupadas + $sillas_deseadas > $aforo_total) {
        $mensaje = "No hay suficientes sillas disponibles en esa película.";
    } else {
        $_SESSION['butacas'][$pelicula] += $sillas_deseadas;
        $mensaje = "Reserva realizada correctamente para $pelicula.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservar Película</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>

    <form method="post" action="">
        <label>Selecciona una película:</label><br>
        <select name="pelicula">
            <option value="Pelicula1">Pelicula 1</option>
            <option value="Pelicula2">Pelicula 2</option>
            <option value="Pelicula3">Pelicula 3</option>
        </select><br><br>

        <label>¿Cuántas sillas quieres reservar?</label><br>
        <input type="number" name="sillas" min="1" required><br><br>

        <input type="submit" value="Reservar">
    </form>

    <?php
    if ($mensaje != "") {
        echo "<p><strong>$mensaje</strong></p>";
    }
    ?>

    <h3>Estado actual de las reservas:</h3>
    <ul>
        <li>Pelicula 1: <?php echo $_SESSION['butacas']['Pelicula1']; ?> / <?php echo $aforo_total; ?> sillas ocupadas</li>
        <li>Pelicula 2: <?php echo $_SESSION['butacas']['Pelicula2']; ?> / <?php echo $aforo_total; ?> sillas ocupadas</li>
        <li>Pelicula 3: <?php echo $_SESSION['butacas']['Pelicula3']; ?> / <?php echo $aforo_total; ?> sillas ocupadas</li>
    </ul>

    <br>
    <a href="reiniciar.php">Reiniciar sesión</a>
</body>
</html>
