<?php 
// Incluimos el archivo que contiene la conexión a la base de datos.
  include 'conexion.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar productos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<h2> Lista de productos</h2>
<p><a href="index.php"> << Volver</a></p>

<?php
    try {
        // Ejecutamos una consulta SQL para obtener todos los productos
        // ORDER BY id DESC muestra los registros desde el más reciente al más antiguo,
        // porque se crean con id con incremento automático
        $consulta = $conexion->query("SELECT * FROM producto ORDER BY id DESC");

        // Obtenemos todas las filas de la consulta en un array asociativo.
        $filas = $consulta->fetchAll(PDO::FETCH_ASSOC);

        // Si existen registros en la tabla...
        if ($filas) {

            // Imprimimos la cabecera de la tabla HTML donde mostraremos los resultados.
            echo "<table border='1' cellpadding='6' style='margin:auto;'>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>";

            // Recorremos cada fila obtenida de la base de datos.
            foreach ($filas as $r) {

                // Mostramos cada álbum en una fila de la tabla HTML.
                echo "<tr>
                        <td>{$r['id']}</td>
                        <td>{$r['nombre']}</td>
                        <td>{$r['precio']}</td>
                        <td>{$r['cantidad']}</td>
                    </tr>";
            }

            // Cerramos la tabla.
            echo "</table>";

        } else {
            // Si no hay registros, mostramos un mensaje informativo.
            echo "<p>No hay productos registrados.</p>";
        }

    } catch (PDOException $e) {
        // Si ocurre un error con la base de datos, se detiene la ejecución y se muestra el mensaje del error.
        die("Conexión fallida: " . $e->getMessage());
    }
?>

</body>
</html>

