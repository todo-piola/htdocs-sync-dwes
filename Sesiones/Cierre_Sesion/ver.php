<?php
session_start(); // Unirse a la sesión

// Si existe la variable, mostramos los datos
if (isset($_SESSION['usuario'])) {
    echo "<h2> Datos de la sesión actual</h2>";
    echo "Usuario: " . $_SESSION['usuario'] . "<br>";
    echo "Edad: " . $_SESSION['edad'] . "<br>";
    echo "<h3>Aficiones:</h3>";
        foreach ($_SESSION['aficiones'] as $aficion) {
            echo "- $aficion<br>";
        }
        
    echo "<a href='cerrar.php'>Cerrar sesión</a>";

    $session_id = session_id(); // ID único de la sesión
    $session_file = session_save_path() . "/sess_" . $session_id;

    echo "<p>ID de sesión: $session_id</p>";
    echo "<p>Archivo de sesión: $session_file</p>";
} else {
    echo " No hay sesión activa.";
}
?>