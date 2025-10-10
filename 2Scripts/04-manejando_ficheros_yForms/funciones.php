<?php
// funciones.php

function guardarDatos($nombre, $direccion, $telefono, $exp1, $exp2, $habSW, $habHW) {
    // Crear nombre del archivo
    $nombreArchivo = str_replace(' ', '_', $nombre) . '.txt';
    
    // Preparar contenido
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Dirección: $direccion\n";
    $contenido .= "Teléfono: $telefono\n";
    $contenido .= "Experiencia 1: $exp1\n";
    $contenido .= "Experiencia 2: $exp2\n";
    $contenido .= "Habilidades SW: $habSW\n";
    $contenido .= "Habilidades HW: $habHW\n";
    
    // Escribir en el archivo
    file_put_contents($nombreArchivo, $contenido);
    
    return $nombreArchivo;
}

function leerArchivo($nombreArchivo) {
    // Abrir archivo
    $archivo = fopen($nombreArchivo, 'r');
    
    echo "<h3>Contenido del archivo:</h3>";
    
    // Leer línea por línea
    while (!feof($archivo)) {
        $linea = fgets($archivo);
        echo $linea . "<br>";
    }
    
    // Cerrar archivo
    fclose($archivo);
}

function validarArchivoTXT($archivo) {
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
    
    if ($extension != 'txt') {
        return "ERROR: El archivo debe ser .txt";
    }
    
    // Mover archivo subido
    $destino = "subido_" . $archivo['name'];
    move_uploaded_file($archivo['tmp_name'], $destino);
    
    return "Archivo TXT subido correctamente: $destino";
}
?>