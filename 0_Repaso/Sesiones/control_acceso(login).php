<!-- Ejercicio 2: Control de acceso con sesiones (Intermedio)
Desarrolla un sistema simple de login:

Página de login con usuario y contraseña (puedes usar datos hardcodeados: usuario "admin", password "1234")

Al iniciar sesión correctamente, guardar el nombre de usuario en sesión
Crear una página protegida que solo sea accesible si hay sesión activa
Mostrar el nombre del usuario en la página protegida
Botón de logout que destruya la sesión
Si intentan acceder a la página protegida sin sesión, redirigir al login -->

<?php

session_start();
// Contador de sesiones iniciadas, si no está inicializado se inicializa
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

        header("Location: acceso_protegido.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Página de Login</title>
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
</body>
</html>