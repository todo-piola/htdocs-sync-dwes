
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>CRUD - Chinese Man</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <h1> Chinese Man - Gestión de Álbumes</h1>
  <p>Selecciona una opción del menú:</p>
    <div class="menu">
        <form action="crear_bbdd_y_tabla.php" method="get"><button type="submit"> PASO 1 - BORRAR/CREAR BBDD </button></form>
        <form action="insertar.php" method="get"><button type="submit">I - Insertar</button></form>
        <form action="actualizar.php" method="get"><button type="submit">A - Actualizar</button></form>
        <form action="consultar.php" method="get"><button type="submit">C - Consultar</button></form>
        <form action="borrar.php" method="get"><button type="submit">B - Borrar registro</button></form>
    </div>
</body>
</html>
