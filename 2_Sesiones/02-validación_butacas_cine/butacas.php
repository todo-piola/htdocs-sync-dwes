<?php
session_start();

// Guardamos la película elegida desde el formulario anterior
if (isset($_POST['pelicula'])) {
    $_SESSION['pelicula'] = $_POST['pelicula'];
}

$pelicula = $_SESSION['pelicula'] ?? 'No seleccionada';

// Recuperamos las butacas ocupadas de esa película (si existen)
$butacas_ocupadas = $_SESSION['butacas_ocupadas'][$pelicula] ?? [];

// Definimos todas las butacas del cine
$todas_las_butacas = ['A1', 'A2', 'B1', 'B2'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elige tu butaca</title>
</head>
<body>
    <h1>Selecciona tu butaca para: <?= htmlspecialchars($pelicula) ?></h1>

    <form action="confirmar.php" method="post">
        <label>Butaca:
            <select name="butaca">
                <?php foreach ($todas_las_butacas as $butaca): ?>
                    <?php if (in_array($butaca, $butacas_ocupadas)): ?>
                        <option value="<?= $butaca ?>" disabled><?= $butaca ?> (ocupada)</option>
                    <?php else: ?>
                        <option value="<?= $butaca ?>"><?= $butaca ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </label>
        <br><br>
        <input type="submit" value="Confirmar selección">
    </form>

    <br>
    <a href="peliculas.php">Volver al inicio</a>
    <br><br>
    <a href="reiniciar.php" style="color:red;"> Reiniciar sesión</a>
</body>
</html>