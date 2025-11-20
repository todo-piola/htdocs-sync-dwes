<?php
/*
    Ejemplo de manejo de ficheros con:
    fopen, fwrite, fclose, fgets
    fseek, ftell, rewind, y unlink.
*/

// Escribe el contenido del segundo parámetro en un fichero del primer parámetro que crea
// un fichero, FILE_APPEND no lo sobreescribe
file_put_contents($fichero, $contenido, FILE_APPEND);

// Devuelve true si el fichero existe y false si no existe
file_exists($fichero)

$nombre = "funciones_ficheros.txt";

// Crear un fichero y escribir contenido
$fich = fopen($nombre, "w");
fwrite($fich, "Primera línea\nSegunda línea\nTercera línea\n");
fclose($fich);

// Abrir el fichero en modo lectura
$fich = fopen($nombre, "r");

// Mostrar posición actual (debería ser 0 al abrir)
echo "Posición inicial: " . ftell($fich) . "<br>";

// Mover el puntero con fseek
// fseek(recurso, desplazamiento, origen)
// origen puede ser: SEEK_SET (inicio), SEEK_CUR (actual), SEEK_END (final)
fseek($fich, 10, SEEK_SET);
echo "Posición después de mover con fseek(10): " . ftell($fich) . "<br>";

// Leer desde esa posición
$texto = fgets($fich);
echo "Texto leído desde posición 10: $texto<br>";

// Volver al principio con rewind
rewind($fich);
echo "Posición después de rewind: " . ftell($fich) . "<br>";

// Leer la primera línea
echo "Primera línea: " . fgets($fich) . "<br>";

// Cerrar el fichero
fclose($fich);

// Renombrar (mover) el fichero
$nuevo_nombre = "fichero_renombrado.txt";
if (rename($nombre, $nuevo_nombre)) {
    echo "Fichero renombrado a '$nuevo_nombre'<br>";
} else {
    echo "Error al renombrar el fichero<br>";
}


// Eliminar fichero
unlink(funciones_ficheros.txt);