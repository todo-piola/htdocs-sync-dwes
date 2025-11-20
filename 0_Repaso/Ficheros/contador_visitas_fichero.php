<!-- Ejercicio 3: Contador de visitas con ficheros (Intermedio)
Crea un sistema que:
* Cuente cuántas veces se ha visitado una página
* Guarde el contador en un archivo de texto
* Muestre el número total de visitas
* Bonus: guarda también la fecha y hora de la última visita

Realiza este ejercicio de forma sencilla y documentando cada parte -->

<?php

// PASO 1: Definir el nombre del archivo
$archivo_contador = 'contador.txt';
$archivo_fecha = 'ultima_visita.txt';

// PASO 2: Verificar si el archivo existe
// Si no existe, lo creamos con valor inicial 0
if (!file_exists($archivo_contador)) {
    file_put_contents($archivo_contador, '0');
}


// PASO 3: Leer el contador actual
// file_get_contents() lee todo el contenido del archivo
$contador = file_get_contents($archivo_contador);
// Convertimos a número entero por seguridad
$contador = (int)$contador;

// PASO 4: Incrementar el contador
$contador++;

// PASO 5: Guardar el nuevo valor
// file_put_contents() sobrescribe el archivo con el nuevo valor
file_put_contents($archivo_contador, $contador);

// BONUS: Guardar fecha y hora actual
// date() formatea la fecha actual
$fecha_actual = date('d/m/Y H:i:s');
file_put_contents($archivo_fecha, $fecha_actual);

// BONUS: Leer la fecha de la última visita
if (file_exists($archivo_fecha)) {
    $ultima_visita = file_get_contents($archivo_fecha);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f0f0f0;
            text-align: center;
        }
        .contador {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .numero {
            font-size: 48px;
            color: #007bff;
            font-weight: bold;
        }
        .fecha {
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="contador">
        <h1> Contador de Visitas</h1>
        
        <!-- Mostrar el número de visitas -->
        <p>Esta página ha sido visitada:</p>
        <div class="numero"><?php echo $contador; ?></div>
        <p>veces</p>
        
        <!-- Mostrar la fecha de la última visita -->
        <?php if (isset($ultima_visita)): ?>
            <div class="fecha">
                <strong>Última visita:</strong><br>
                <?php echo $ultima_visita; ?>
            </div>
        <?php endif; ?>
        
        <hr style="margin: 30px 0;">
        
        <!-- Botón para recargar y ver el contador aumentar -->
        <button onclick="location.reload();" style="padding: 10px 20px; font-size: 16px; cursor: pointer;">
             Recargar Página
        </button>
    </div>
</body>
</html>