<?php
// Crear un nuevo documento DOM
$tienda = new DOMDocument();

// Cargar el XML
$tienda->load('tiendavideojuegos.xml');

// Validar el XML contra el esquema XSD
if ($tienda->schemaValidate('tiendavideojuegos.xsd')) {
    echo "El fichero XML es válido según el esquema XSD";
} else {
    echo "El fichero XML NO es válido";
}
?>