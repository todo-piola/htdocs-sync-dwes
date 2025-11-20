<?php
// ====================================
// FUNCIÓN PARA VALIDAR USUARIO
// ====================================
function validar_credenciales($usuario, $clave) {
    // Usuarios válidos (en una app real estarían en base de datos)
    if ($usuario === "usuario" && $clave === "1234") {
        return true;
    } elseif ($usuario === "admin" && $clave === "1234") {
        return true;
    }
    return false;
}

// ====================================
// VARIABLES DE CONTROL
// ====================================
$error = false;
$usuario_ingresado = "";

// ====================================
// PROCESAR FORMULARIO CUANDO SE ENVÍA
// ====================================
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario
    $usuario_ingresado = $_POST['usuario'];
    $clave_ingresada = $_POST['clave'];
    
    // Validamos las credenciales
    if (validar_credenciales($usuario_ingresado, $clave_ingresada)) {
        // ✅ CREDENCIALES CORRECTAS
        session_start();                          // Iniciamos la sesión
        $_SESSION['usuario'] = $usuario_ingresado; // Guardamos el usuario en la sesión
        header("Location: bienvenido_usuario.php");        // Redirigimos a la página principal
        exit;                                     // Detenemos la ejecución
    } else {
        // ❌ CREDENCIALES INCORRECTAS
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema de Sesiones</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 50px auto; }
        .error { color: red; background: #ffe6e6; padding: 10px; border-radius: 5px; }
        .aviso { color: #666; background: #f0f0f0; padding: 10px; border-radius: 5px; }
        input { margin: 5px 0; padding: 8px; width: 100%; box-sizing: border-box; }
        button { background: #007bff; color: white; padding: 10px; border: none; cursor: pointer; width: 100%; }
    </style>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    
    <?php
    // Mostrar aviso si viene redirigido de otra página
    if (isset($_GET["redirigido"])) {
        echo '<p class="aviso">⚠️ Debes iniciar sesión para continuar</p>';
    }
    
    // Mostrar error si las credenciales son incorrectas
    if ($error) {
        echo '<p class="error">❌ Usuario o contraseña incorrectos</p>';
    }
    ?>
    
    <form method="POST" action="">
        <label>Usuario:</label>
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario_ingresado); ?>" required>
        
        <label>Contraseña:</label>
        <input type="password" name="clave" required>
        
        <button type="submit">Entrar</button>
    </form>
    
    <p style="color: #999; font-size: 12px;">
        💡 Usuarios de prueba: usuario/1234 o admin/1234
    </p>
</body>
</html>