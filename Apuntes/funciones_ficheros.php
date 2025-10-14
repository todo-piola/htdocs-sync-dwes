<?php

// Escribe el contenido del segundo parámetro en un fichero del primer parámetro que crea
// un fichero, FILE_APPEND no lo sobreescribe
file_put_contents($fichero, $contenido, FILE_APPEND);

// Devuelve true si el fichero existe y false si no existe
file_exists($fichero)