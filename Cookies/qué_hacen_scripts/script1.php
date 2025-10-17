<?php
if( isset( $_COOKIE['lang'])) {
//Actualizar cookie
    /* Si la cookie llamada 'lang' existe:
    1. Le aumentamos el tiempo de duración una hora a la cookie
    2. La guardamos en el directorio raiz */
    setcookie("lang", $_COOKIE['lang'], time() + (6000), "/");
}
else {
//Valor por defecto
    // Si lang no existe, entonces la crea con la configuración previa y además le añade el valor esp
    setcookie("lang", 'esp', time() + (6000),"/" );
}
?>