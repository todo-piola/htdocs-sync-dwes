<?php
 mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 $mysqli = new mysqli("localhost", "root", "", null);
 
 // Comprobar conexión
 if ($mysqli->connect_errno) {
     die("Error: " . $mysqli->connect_error);
 }
    // Crear base de datos si no existe
$mysqli->query("CREATE DATABASE IF NOT EXISTS chinese_man_db");
$mysqli->query("CREATE TABLE IF NOT EXISTS albumes (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    titulo VARCHAR(100) NOT NULL,
    anio INT,
    sello VARCHAR(100),
    pais VARCHAR(50)");
    
 // Elegir base más tarde
 $mysqli->select_db("chinese_man_db");
 $mysqli->close()

 
?>