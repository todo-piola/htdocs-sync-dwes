
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['aceptar'])) {
        // El usuario ha aceptado las cookies
        setcookie('aceptar_cookies', 'si', time() + (86400 * 30), "/"); // Cookie válida por 30 días
        header("Location: sesiones.php");
        exit;
    } else {
        // El usuario no ha aceptado las cookies
        $mensaje = "Debe aceptar las cookies para continuar.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aceptación de Cookies</title>
</head>
<body>
    <h2>Política de Cookies</h2>
    <p>Debe aceptar las cookies para continuar. Al aceptar, permites el uso de cookies según la política de privacidad.</p>
    <?php
    if (isset($mensaje)) {
        echo "<p style='color:red;'>$mensaje</p>";
        header("refresh:2, reservar.php");
    }
    ?>
    <form method="POST" action="">
        <button type="submit" name="aceptar">Aceptar Cookies</button>
        <button type="submit" name="no_aceptar">No Aceptar Cookies</button>
    </form>
</body>
</html>
