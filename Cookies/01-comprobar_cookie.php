<?php
function comprobarCookies() {
    return isset($_COOKIE['cookie_prueba']);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobar Cookie</title>
    <style>
        body { font-family: Arial; max-width: 500px; margin: 50px auto; }
        .activa { background: #d4edda; padding: 20px; border: 2px solid #28a745; border-radius: 8px; }
        .inactiva { background: #f8d7da; padding: 20px; border: 2px solid #dc3545; border-radius: 8px; }
        a { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Estado de las Cookies</h1>
    
    <?php if(comprobarCookies()): ?>
        <div class="activa">
            <h2>✅ Las Cookies están activas</h2>
            <p><strong>Valor de la cookie:</strong> <?php echo htmlspecialchars($_COOKIE['cookie_prueba']); ?></p>
        </div>
    <?php else: ?>
        <div class="inactiva">
            <h2>❌ Las Cookies están desactivadas</h2>
            <p>O aún no has creado ninguna cookie.</p>
        </div>
    <?php endif; ?>
    
    <a href="01-form_cookie.html">← Volver al formulario</a>
</body>
</html>