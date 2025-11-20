<?php
session_start();

// Contador de sesiones iniciadas
if (!isset($_SESSION['contador_sesiones'])) {
    $_SESSION['contador_sesiones'] = 0;
}

// Si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Usuario fijo para el ejemplo
    if ($usuario === "usuario" && $clave === "1234") {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['contador_sesiones']++;

        // Inicializamos estructura de butacas si no existe
        if (!isset($_SESSION['butacas'])) {
            $_SESSION['butacas'] = [
                "Pelicula1" => 0,
                "Pelicula2" => 0,
                "Pelicula3" => 0
            ];
        }

        header("Location: peliculas.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Identificación</title>
</head>
<body>
    <h2>Inicio de sesión</h2>

    <form method="post" action="">
        Usuario: <input type="text" name="usuario" required><br><br>
        Contraseña: <input type="password" name="clave" required><br><br>
        <input type="submit" value="Entrar">
    </form>
    <br>
    <p style="color:gray"> usuario ==> 1234 </p>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <p>Sesiones iniciadas hasta ahora: <?php echo $_SESSION['contador_sesiones']; ?></p>
</body>
</html>
