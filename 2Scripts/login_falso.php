<?php
/*si va bien redirige a bienvenido.html
si va mal, mensaje de error */
if ($_POST['usuario']=="usuario" and $_POST["clave"]=="1234"){
header("Location:bienvenido.html");
} else {
header("Location:error.html");
}