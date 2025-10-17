<?php
$tiempo_expiracion = 365 * 24 * 3600; //tiempo en segundos relativo a 1 año
setcookie("nombre","Juan", time()+$tiempo_expiracion, "/");

if (isset($_COOKIE["nombre"])) { //comprueba si la cookie está presente
    echo "El nombre en cookie es:".$_COOKIE["nombre"];
}
?>

<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
    <form name="prueba" method="GET" action="cookie1.php">
        <input type="submit" value="probar"/>
    </form>
</body>
</html>