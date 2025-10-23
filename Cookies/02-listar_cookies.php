<?php
function listado_cookies() {
    $contador = 1;
    echo 'Nombre de $_COOKIES activas <br>';
    foreach ($_COOKIE as $cookie_iteracion) {
        echo $contador. ". ". $cookie_iteracion.'<br>';
        $contador+=1;
    }
}

echo listado_cookies();