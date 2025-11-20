<?php
/* Si va bien redirige a principal.php; si va mal, muestra un mensaje de error */

// Comprobamos si el formulario se ha enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Guardamos los datos enviados por el formulario en variables
    // ($_POST es un array superglobal que contiene los datos enviados por POST)
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    // Comprobamos si el usuario y la clave coinciden con los valores esperados
    // (en un caso real, se comprobarían contra una base de datos)
    if ($usuario == "usuario" && $clave == "1234") {
        // Si las credenciales son correctas, redirigimos al usuario a principal.php
        header("Location: 02-principal_form_en_uno.php");
        exit(); // Muy importante: detener el script tras redirigir
    } else {
        // Si no coinciden, activamos una variable que indicará que hubo un error
        $err = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de login</title>
    <meta charset="UTF-8">
</head>
<body>

    <?php 
    // Si la variable $err está definida, significa que las credenciales son incorrectas
    // Mostramos un mensaje de error al usuario
    if (isset($err)) {
        echo "<p style='color:red;'>Revise usuario y contraseña</p>";
    }
    ?>

    <!-- Formulario de login -->
    <!-- method="POST" indica que los datos se enviarán por POST (no visibles en la URL) -->
    <!-- action usa $_SERVER["PHP_SELF"] para que el formulario se procese en el mismo archivo -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <!-- Campo de texto para el nombre de usuario -->
        <!-- Si ya se introdujo antes, lo volvemos a mostrar con value -->
        <!-- htmlspecialchars() evita que el usuario inyecte código peligroso -->
        <label for="usuario">Usuario</label>
        <input 
            id="usuario" 
            name="usuario" 
            type="text" 
            value="<?php if (isset($usuario)) echo htmlspecialchars($usuario); ?>">
        <br><br>

        <!-- Campo para la contraseña -->
        <label for="clave">Clave</label>
        <input id="clave" name="clave" type="password">
        <br><br>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>

<!--
===========================================================
🧠 PUNTOS CLAVE DEL CÓDIGO (Resumen tipo "chuleta" para examen)
===========================================================

1️⃣  $_SERVER["REQUEST_METHOD"]
    - Detecta si se accede por GET o POST.
    - Si es "POST", significa que el usuario ha enviado el formulario.

2️⃣  $_POST["nombreCampo"]
    - Contiene los datos enviados desde el formulario (solo si se usa method="POST").

3️⃣  header("Location: ...")
    - Redirige al usuario a otra página (por ejemplo, "principal.php").
    - Siempre debe ir seguido de exit() para detener el script.

4️⃣  exit()
    - Detiene la ejecución del script. Evita que se siga generando HTML tras una redirección.

5️⃣  $err + isset($err)
    - Se usa como indicador de error para mostrar mensajes si el login falla.

6️⃣  htmlspecialchars()
    - Convierte caracteres especiales en entidades HTML.
    - Evita ataques XSS y protege al mostrar texto del usuario.

7️⃣  $_SERVER["PHP_SELF"]
    - Devuelve el nombre del archivo actual.
    - Sirve para que el formulario se envíe a sí mismo (mismo script).

8️⃣  method="POST"
    - Envía los datos ocultos en la cabecera HTTP (no aparecen en la URL).
    - Ideal para contraseñas o información sensible.

9️⃣  value="<?php if (isset($usuario)) echo htmlspecialchars($usuario); ?>"
    - Mantiene el valor del campo usuario si hubo un error al enviar.

===========================================================
Resumen del funcionamiento:
- Si se entra por GET → se muestra el formulario vacío.
- Si se entra por POST → se procesan los datos.
- Si los datos son correctos → redirige a principal.php.
- Si los datos son incorrectos → muestra error y mantiene el usuario.
===========================================================
-->
