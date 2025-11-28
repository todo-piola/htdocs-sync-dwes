<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli("localhost", "root", "", "facultad");

    // Consulta no preparada
    $mysqli->query("DROP TABLE IF EXISTS test");

    $mysqli->query("CREATE TABLE IF NOT EXISTS test(id INT, label TEXT)");

    // Consulta preparada, paso 1: preparación
    $stmt = $mysqli->prepare("INSERT INTO test(id, label) VALUES (?, ?)");

    // Consulta preparada, paso 2: enlaza los valores y ejecuta la consulta
    /* $id = 1;
    $label = 'PHP';
    $stmt->bind_param("is", $id, $label); // "is" significa que $id está enlazado como un integer y $label como un string
    $stmt->execute(); */

    foreach(['Java', 'C++', 'Python'] as $index => $lang) {
        $id = $index + 1; // Incrementa el ID
        $label = $lang;
        $stmt->bind_param("is", $id, $label);
        $stmt->execute();
    }
    echo "Datos insertados correctamente.";

    $stmt = mysqli->prepare("DELETE FROM test WHERE id = ?");
    $id = 1;
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "Registro eliminado correctamente.";

    // Cerrar la conexión
    $mysqli->close();
?>