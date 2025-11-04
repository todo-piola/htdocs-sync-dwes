<?php
$datos = simplexml_load_file("tiendavideojuegos.xml");
$nombre = $datos->xpath("//nombre");

foreach($nombre as $valor){
    print_r($valor);
    echo "<br>";
}