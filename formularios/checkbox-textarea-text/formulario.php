<?php
// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "") or die('No se pudo conectar: ' . mysqli_error($link));
$db = mysqli_select_db($link, "domicilio") or die('No se pudo seleccionar la base de datos');

// Volcamos las variables directamente como en clase
$plato1 = $_POST['plato1'];
$plato2 = $_POST['plato2'];
$plato3 = $_POST['plato3'];
$plato4 = $_POST['plato4'];
$plato5 = $_POST['plato5'];
$privacidad = $_POST['privacidad'];
$promociones = $_POST['promociones'];
$entrega = $_POST['entrega'];
$pago = $_POST['pago'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// Creamos la consulta directamente
$consulta = "INSERT INTO pedidos(plato1, plato2, plato3, plato4, plato5, privacidad, promociones, entrega, pago, direccion, email, telefono, mensaje)
VALUES ('$plato1', '$plato2', '$plato3', '$plato4', '$plato5', '$privacidad', '$promociones', '$entrega', '$pago', '$direccion', '$email', '$telefono', '$mensaje')";

// Visualizar la consulta como en clase
echo "----------------------" . $consulta . "--";

// Ejecutar consulta
mysqli_query($link, $consulta) or die("<h3>Error al insertar en la tabla</h3>");

// Confirmación
echo "¡Graciassss! Hemos recibido sus datos.\n";

// Cerrar conexión (opcional)
mysqli_close($link);
?>