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

    // Usuario fijo para los ejemplos
    if ($usuario === "usuario" && $clave === "1234" || $usuario === "admin" && $clave === "admin" 
        || $usuario === "cliente1" && $clave === "1234" || $usuario === "cliente2" && $clave === "1234") {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['contador_sesiones']++;
        header("Location: cookies.php");
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
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <p>Sesiones iniciadas hasta ahora: <?php echo $_SESSION['contador_sesiones']; ?></p>
</body>
</html>