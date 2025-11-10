<?php
require_once("conexion.php");
try {
 $sql = "INSERT INTO usuarios (id_usuario, email) VALUES (?, ?)";
 $stmt = $conexion->prepare($sql);

 $usuarios = [
    ["66", "juana@perez.es"],
    ["41", "luis@gomez.com"],
    ["2", "ana@torres.com"],
    ["73", "mario@rodriguez.net"],
    ["25", "sara@martinez.org"]
];

// 3️⃣ Recorremos el array e insertamos cada usuario
foreach ($usuarios as $usuario) {
    $stmt->execute($usuario);
}

echo " Datos insertados correctamente";

} catch (PDOException $e) {
 die("No se puede insertar datos: " . $e->getMessage());
}
?>
