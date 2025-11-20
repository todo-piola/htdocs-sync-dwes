<?php
// ⚠️ IMPORTANTE: No puede haber NADA antes de setcookie() y header()
// Ni espacios, ni echo, ni HTML

// Obtener el valor del formulario
$valor_cookie = $_POST['valor_cookie'] ?? '';

// Crear la cookie (válida por 30 días)
setcookie('cookie_prueba', $valor_cookie, time() + 30*24*3600);

// ✅ REDIRIGIR SIN HACER ECHO
// La cookie estará disponible en la siguiente petición
header("Location: 01-comprobar_cookie.php");
exit; // Detener ejecución
?>
