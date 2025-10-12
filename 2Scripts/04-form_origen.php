
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario - Origen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>
<body>
    <h1>Formulario simple</h1>

    <form action="04-fichero_destino.php" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label>Teléfono:</label>
        <input type="text" name="telefono" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>