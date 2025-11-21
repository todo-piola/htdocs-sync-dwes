
// POR FAVOR REVISAR DONDE ESTA EL ERROR

<?php
// Conexión a la base de datos
session_start();
// Si el usuario no ha iniciado sesión, lo redirigimos
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}  

if (empty($conexion_pdo)) {
    die("Error: no hay conexión a la base de datos. Revisa conexion.php");
}

$mensaje = "";

// Si se envía el formulario de reserva...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // recojo y valido datos
    $pelicula_id = intval($_POST['pelicula'] ?? 0);
    $sillas_deseadas = max(0, intval($_POST['sillas'] ?? 0));

    if ($pelicula_id <= 0 || $sillas_deseadas <= 0) {
        $mensaje = "Selecciona una película y reserva al menos una silla.";
    } else {
        try {
            // obtener datos de la película
            $consulta_ejecutar = $conexion_pdo->prepare("SELECT id, nombre, sillas_total, sillas_reservadas FROM peliculas WHERE id = ? LIMIT 1");
            $consulta_ejecutar->execute([$pelicula_id]);
            // Llama a fetch para obtener la película
            $pelicula = $consulta_ejecutar->fetch(PDO::FETCH_ASSOC);

            if (!$pelicula) {
                $mensaje = "Película no encontrada.";
            } else {
                $disponibles = intval($pelicula['sillas_total']) - intval($pelicula['sillas_reservadas']);
                if ($sillas_deseadas > $disponibles) {
                    $mensaje = "No hay suficientes sillas disponibles.";
                } elseif (!$usuario_id) {
                    $mensaje = "Usuario no identificado. Inicia sesión de nuevo.";
                } else {
                    $insertar = $conexion_pdo->prepare("INSERT INTO reservas (usuario_id, pelicula_id, sillas_reservadas) VALUES (?, ?, ?)");
                    if ($insertar->execute([$usuario_id, $pelicula['id'], $sillas_deseadas])) {
                        // actualizar sillas reservadas en la tabla de películas
                        $actualizar = $conexion_pdo->prepare("UPDATE peliculas SET sillas_reservadas = sillas_reservadas + ? WHERE id = ?");
                        $actualizar->execute([$sillas_deseadas, $pelicula['id']]);

                        $restantes = $disponibles - $sillas_deseadas;
                        $mensaje = "Reserva realizada para " . htmlspecialchars($pelicula['nombre']) . ". Sillas reservadas: $sillas_deseadas. Restantes: $restantes.";
                    } else {
                        $mensaje = "No se pudo guardar la reserva. Intenta nuevamente.";
                    }
                }
            }
        } catch (PDOException $e) {
            $mensaje = "Error en la reserva: " . $e->getMessage();
        }
    }
}
?>

<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h2>
    <form method="post" action="">
        <label>Selecciona una película:</label><br>
        <select name="pelicula" required>
            <?php
            // Cargo películas desde la base de datos y uso el id como valor
            // Aquí no he conseguido que me realice la reserva correctamente

            
            // Consulta para obtener las películas disponibles
            $peliculasSQL = $conexion_pdo->query("SELECT id, nombre FROM peliculas ORDER BY nombre");
            // Las recojo de la bbdd
            $peliculas = $peliculasSQL->fetchAll(PDO::FETCH_ASSOC);
            // Si existe la variable películas...
            if ($peliculas) {
                // Recorro cada película
                foreach ($peliculas as $p) {
                    $id = $p['id'];
                    $nombre = htmlspecialchars($p['nombre']);
                    // Muestro las opciones en el select según el id y el nombre
                    echo "<option value=\"$id\">$nombre</option>";
                }
            } else {
                echo '<option value="">No hay películas disponibles</option>';
            }
            ?>
        </select><br><br>

        <label>¿Cuántas sillas quieres reservar?</label><br>
        <input type="number" name="sillas" min="1" required><br><br>

        <input type="submit" value="Reservar">
    </form>
    <?php
    if ($mensaje != "") {
        echo "$mensaje";
    }
    ?>
    <br>
    <a href="logout.php">Reiniciar sesión</a>
</body>
</html>