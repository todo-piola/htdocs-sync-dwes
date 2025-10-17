<?php
$nombre_cookie = $_POST['nombre'] ?? '';
setcookie('mi_primera_cookie', $nombre_cookie, time() + 30*24*3600);

echo "La cookie ha sido creada. Recarga la página para verla. <br>";

if (isset($_COOKIE['mi_primera_cookie'])) {
    echo "El valor de la cookie 'mi_primera_cookie' es: " . $_COOKIE['mi_primera_cookie'];
}

header("Location: 01-comprobar_cookie.php");
?>