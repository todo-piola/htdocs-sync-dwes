<?php
// Cargar el fichero XML
$xml = new DOMDocument();
$xml->load('tiendavideojuegos.xml');

// Cargar la transformación XSLT
$xsl = new DOMDocument();
$xsl->load('tiendavideojuegos.xslt');

// Crear el procesador XSLT
$procesador = new XSLTProcessor();
$procesador->importStylesheet($xsl);

// Transformar el XML a HTML
$html = $procesador->transformToXml($xml);

// Mostrar el resultado en el navegador
echo $html;
?>
