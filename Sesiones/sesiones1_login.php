<?php
// formulario de login habitual
// si va bien abre sesión, guarda el nombre de usuario y redirige a principal.
// si va mal, muestra un mensaje de error.

function comprobar_usuario($nombre, $clave) {
    if ($nombre === "usuario" && $clave === "1234") {
        $usu['nombre'] = "usuario";
        $usu['rol'] = 0;
        return $usu;
    } elseif ($nombre === "admin" && $clave === "1234") {
        $usu['nombre'] = "admin";
        $usu['rol'] = 1;
        return $usu;
    } else {
        return FALSE;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
    if ($usu == FALSE) {
        $err = TRUE;
        $usuario = $_POST['usuario'];
    } else {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: sesiones1_principal.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de login</title>
</head>
<body>
<?php
if (isset($_GET["redirigido"])) {
    echo "<p>Haga login para continuar</p>";
}
if (isset($err) && $err == true) {
    echo "<p>Revise usuario y contraseña</p>";
}
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Usuario:
    <input value="<?php if (isset($usuario)) echo $usuario; ?>" id="usuario" name="usuario" type="text"><br>
    Clave:
    <input id="clave" name="clave" type="password"><br>
    <input type="submit" value="Entrar">
</form>
</body>
</html>


