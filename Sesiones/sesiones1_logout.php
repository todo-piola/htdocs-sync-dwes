<?php
session_start(); // unirse a la sesión
$_SESSION = array(); // vaciar variables
session_destroy(); // destruir la sesión
setcookie(session_name(), "", time() - 1000); // eliminar cookie de sesión
header("Location: sesiones1_login.php");
exit;
