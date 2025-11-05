<?php
$fich = fopen("fichero_ejemplo.txt", "r");

if($fich) {
    rename("fichero_ejemplo.txt", "cambio_nombre.txt");
}


fclose($fich);