<?php
$cadena="Valentina Anzoategui Urrutia-Garrogerrikaetxebarria";
# Rompo la cadena con la funcion 'implode' y la transformo en un array de palabras separados por espacio
$frase = explode(" ", $cadena);

// Después junto esa cadena con la función 'implode' y de esta forma elimino los espacios
$fraseSinEspacio = implode($frase);
// Comprobacion
echo $fraseSinEspacio;

// convierto la cadena sin espacios en un array de caracteres para después trabajar con ellos
$arrayCaracteres = str_split($fraseSinEspacio);
$indice = 0;

/* Es un bucle para transformar cada caracter del array de caractéres según el enunciado
    caracteres pares = minuscula
    caracteres impares = mayusculas
    Uso el indice para realizar los cambios
    */
foreach($arrayCaracteres as $caracter) {
    if($indice%2==0 || $indice == 0) {
        $caracter = strtolower($caracter);
    } else {
        $caracter = strtoupper($caracter);
    }
    // comprobacion
    echo "$indice $caracter <br>";
    $indice++;
}

$arrayEncriptado = "";
/* Gracias a este bucle, cambiamos encriptamos la frase
Mediante el switch cambiamos las vocales por los números que le corresponden
$minusculas=array('a'=>'1', 'e'=>'2', 'i'=>'3', 'o'=>'4', 'u'=>'5');
$Mayusculas=array('A'=>'9', "E"=>'18', 'I'=>'29', 'O'=>'36', 'U'=>'81'); */
foreach($arrayCaracteres as $caracter) {
    switch($caracter) {
        case 'a':
            $caracter = "1";
            break;
        case 'e':
            $caracter = "2";
            break;
        case 'i':
            $caracter = "3";
            break;
        case 'o':
            $caracter = "4";
            break;
        case 'u':
            $caracter = "5";
            break;
        case 'A':
            $caracter = "9";
            break;
        case 'E':
            $caracter = "18";
            break;
        case 'I':
            $caracter = "29";
            break;
        case 'O':
            $caracter = "36";
            break;
        case 'U':
            $caracter = "81";
            break;
    }
    // Voy añadiendo los caracteres encriptados a un nuevo array
    $arrayEncriptado = "$arrayEncriptado$caracter" ;
}
// Compruebo que se ha guardado correctamente
echo $arrayEncriptado;

//Genero un número aleatorio entre 9 y 60
$numAleatorio = rand(9,60);

 /* 
 Necesitaria buscar como funciona exactamente este método de los arrays, se supone que recorta un array 
por los dos parámetros numéricos que se le indican y devuelve esa cadena
    $arrayAleatorio = array_slice($arrayEncriptado, 1, $numAleatorio);
    echo "<br> $arrayAleatorio"; */