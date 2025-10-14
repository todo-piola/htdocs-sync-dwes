<?php

$frase = "Esta es una cadena de prueba";
// explode separa un string y lo convierte en un array dependiendo del carácter señalado, 
// en este caso, un espacio
$indice = 0;
$arrayPalabras = explode(" ", $frase);
echo "explode: <br>";
foreach($arrayPalabras as $palabra) {
    echo "$indice $palabra <br>";
    $indice++;
}

$cadena_generada = implode('', $arrayPalabras);
echo "<br> implode: <br>";
echo "$cadena_generada <br>";

// Reemplaza todas las ocurrencias del string con el carácter de reemplazo
// El primer parámetro es el que vamos a cambiar por el segundo parámetro
$nombreArchivo = "Fichero Reptiliano";
$nombre = str_replace(' ', '_', $nombreArchivo) . '.txt';
echo "<br> str_replace: <br>";
echo $nombre;

// Devuelve la longitud del string dado
strlen($nombre);

