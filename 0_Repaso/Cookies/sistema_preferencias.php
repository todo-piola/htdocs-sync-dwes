<!-- Ejercicio 1: Sistema de preferencias con cookies (Básico)
Crea una página web donde el usuario pueda:

Seleccionar un color de fondo favorito (3-4 opciones)
Elegir un tamaño de texto (pequeño, mediano, grande)
Guardar estas preferencias en cookies que duren 7 días
Al volver a entrar, la página debe mostrar automáticamente sus preferencias guardadas
Incluir un botón para "Restablecer preferencias"  
que borre las cookies y vuelva a los valores por defecto. -->

<?php
// Iniciar sesión para manejar preferencias
session_start();

// Guardar preferencias en cookies al enviar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['restablecer'])) {
    $nuevo_color = $_POST['color_fondo'] ?? 'white';
    $nuevo_tamano = $_POST['tamano_texto'] ?? 'mediano';
    setcookie('color_fondo', $nuevo_color, time() + 7*24*3600); // 7 días
    setcookie('tamano_texto', $nuevo_tamano, time() + 7*24*3600); // 7 días
    // Redirigir para aplicar cambios
    header("Location: sistema_preferencias.php");
    exit;
}

// Definir valores por defecto
$color_fondo = $_COOKIE['color_fondo'] ?? 'white';
$tamano_texto = $_COOKIE['tamano_texto'] ?? 'mediano';
// Aplicar preferencias si existen
if (isset($_COOKIE['color_fondo'])) {
    $color_fondo = $_COOKIE['color_fondo'];
}
if (isset($_COOKIE['tamano_texto'])) {
    $tamano_texto = $_COOKIE['tamano_texto'];
}
// Manejar restablecimiento de preferencias
if (isset($_POST['restablecer'])) {
    setcookie('color_fondo', '', time() - 3600); // Borrar cookie
    setcookie('tamano_texto', '', time() - 3600); // Borrar cookie
    header("Location: sistema_preferencias.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Preferencias con Cookies</title>
    <style>
        body { 
            background-color: <?php echo htmlspecialchars($color_fondo); ?>;
            font-size: <?php 
                switch ($tamano_texto) {
                    case 'pequeño': echo '12px'; break;
                    case 'grande': echo '20px'; break;
                    default: echo '16px'; // mediano
                }
            ?>;
        }
    </style>
</head>
<body>
    <h1>Preferencias de Usuario</h1>
    <form method="POST" action="">
        <label for="color_fondo">Color de Fondo:</label>
        <select name="color_fondo" id="color_fondo">
            <option value="white" <?php if ($color_fondo == 'white') echo 'selected'; ?>>Blanco</option>
            <option value="gray" <?php if ($color_fondo == 'gray') echo 'selected'; ?>>Gris</option>
            <option value="blue" <?php if ($color_fondo == 'blue') echo 'selected'; ?>>Azul</option>
            <option value="green" <?php if ($color_fondo == 'green') echo 'selected'; ?>>Verde</option>
        </select>
        <br><br>
        <label for="tamano_texto">Tamaño de Texto:</label>
        <select name="tamano_texto" id="tamano_texto">
            <option value="pequeño" <?php if ($tamano_texto == 'pequeño') echo 'selected'; ?>>Pequeño</option>
            <option value="mediano" <?php if ($tamano_texto == 'mediano') echo 'selected'; ?>>Mediano</option>
            <option value="grande" <?php if ($tamano_texto == 'grande') echo 'selected'; ?>>Grande</option>
        </select>
        <br><br>
        <input type="submit" value="Guardar Preferencias">
    </form>
    <form method="POST" action="">
        <input type="hidden" name="restablecer" value="1">
        <input type="submit" value="Restablecer Preferencias">
    </form>
</body>
</html>