<?php
session_start(); // Unirse a la sesión

// Si existe la variable, mostramos los datos
if (isset($_SESSION['usuario'])) {
    echo "<h2> Datos de la sesión actual</h2>";
    echo "Usuario: " . $_SESSION['usuario'] . "<br>";
    echo "Edad: " . $_SESSION['edad'] . "<br>";
    echo "Primera afición: " . $_SESSION['aficiones'][0] . "<br>";
    echo "<a href='cerrar.php'>Cerrar sesión</a>";
} else {
    echo " No hay sesión activa.";
}
?>