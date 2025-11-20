<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function manejadorErrores($errorNumero, $mensaje, $archivo, $linea) {
        echo "<br>Error $errorNumero: $mensaje en $archivo en la línea $linea<br>";
    }

    // Activar el manejador personalizado
    set_error_handler("manejadorErrores");

    // Provocar un error (variable no definida),$b no está inicializada lanzará un ERROR NOTICE
    $a = $b;
    ?>
</body>
</html>