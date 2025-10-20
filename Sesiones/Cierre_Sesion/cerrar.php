<?php
session_start();

if (isset($_SESSION['inicio']) && (time() - $_SESSION['inicio'] > 20)) {
    // Si han pasado más de 20 segundos
    session_unset();     // Borra variables
    session_destroy();   // Destruye la sesión
    echo "⏰ Sesión cerrada por inactividad (más de 20 segundos).";
} else {
    $_SESSION['inicio'] = time();
    echo "✅ Sesión sigue activa, menos de 20 segundos.";
}
?>

<br><a href="ver.php">Volver a ver.php</a>
