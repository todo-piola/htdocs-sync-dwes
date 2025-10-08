<?php
// vista/contenido.php - Contenido principal del evento
$fecha = "15 de Noviembre, 2025";
$hora = "22:00 - 06:00";
$lugar = "Arena Metropolitana";
$precio = "35€";

$descripcion = "Prepárate para vivir una experiencia inolvidable con los mejores DJs del panorama electrónico internacional. Una noche llena de energía, luces y la mejor música.";

$artistas = [
    "DJ Shadow Pulse",
    "Luna Beats",
    "Neon Storm",
    "Bass Revolution"
];
?>

<div class="contenido">
    <div class="evento-info">
        <h2>Sobre el Evento</h2>
        <p><?php echo $descripcion; ?></p>
        
        <div class="detalles">
            <div class="detalle-card">
                <h3>Fecha</h3>
                <p><?php echo $fecha; ?></p>
            </div>
            
            <div class="detalle-card">
                <h3>Horario</h3>
                <p><?php echo $hora; ?></p>
            </div>
            
            <div class="detalle-card">
                <h3>Ubicación</h3>
                <p><?php echo $lugar; ?></p>
            </div>
            
            <div class="detalle-card">
                <h3>Precio</h3>
                <p><?php echo $precio; ?></p>
            </div>
        </div>
    </div>
    
    <div class="evento-info">
        <h2>Line-up de Artistas</h2>
        <?php foreach($artistas as $artista): ?>
            <p>🎧 <?php echo $artista; ?></p>
        <?php endforeach; ?>
        
        <div style="text-align: center;">
            <a href="#" class="btn-reservar">RESERVAR ENTRADAS</a>
        </div>
    </div>
</div>