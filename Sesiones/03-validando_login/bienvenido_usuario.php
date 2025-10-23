<?php
session_start();

// Verificar si hay sesión activa
if (!isset($_SESSION['usuario'])) {
    header("Location: logout.php?redirigido=true");
    exit;
}

echo "Bienvenido, " . htmlspecialchars($_SESSION['usuario']);
?>