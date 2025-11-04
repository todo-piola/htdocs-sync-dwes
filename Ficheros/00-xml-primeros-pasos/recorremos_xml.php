<?php
$datos = simplexml_load_file("tiendavideojuegos.xml");
echo "<br>";
if($datos===false){
    echo "Error al leer el fichero";
}

foreach($datos as $valor){
    print_r($valor);
    echo "<br>";
}