<?php
// index.php
include 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $exp1 = $_POST['exp1'];
    $exp2 = $_POST['exp2'];
    
    // Procesar habilidades SW (checkboxes)
    $habSW = isset($_POST['hab_sw']) ? implode(', ', $_POST['hab_sw']) : 'Ninguna';
    
    // Procesar habilidades HW (radio button)
    $habHW = $_POST['hab_hw'];
    
    // Guardar datos
    $archivo = guardarDatos($nombre, $direccion, $telefono, $exp1, $exp2, $habSW, $habHW);
    
    echo "<h2>Datos guardados en: $archivo</h2>";
    
    // Leer y mostrar contenido
    leerArchivo($archivo);
    
    // Procesar archivo subido
    if (isset($_FILES['archivo_txt']) && $_FILES['archivo_txt']['size'] > 0) {
        echo "<hr>";
        $resultado = validarArchivoTXT($_FILES['archivo_txt']);
        echo "<p>$resultado</p>";
    }
    
    echo "<hr><a href='index.php'>Volver al formulario</a>";
    
} else {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario Alumno</title>
</head>
<body>
    <h1>Registro de Alumno</h1>
    
    <form method="POST" enctype="multipart/form-data">
        
        <p>
            <label>Nombre completo:</label><br>
            <input type="text" name="nombre" required>
        </p>
        
        <p>
            <label>Dirección:</label><br>
            <input type="text" name="direccion" required>
        </p>
        
        <p>
            <label>Teléfono:</label><br>
            <input type="text" name="telefono" required>
        </p>
        
        <p>
            <label>Primera Experiencia:</label><br>
            <textarea name="exp1" rows="3" cols="50" required></textarea>
        </p>
        
        <p>
            <label>Segunda Experiencia:</label><br>
            <textarea name="exp2" rows="3" cols="50" required></textarea>
        </p>
        
        <p>
            <label>Habilidades Software:</label><br>
            <input type="checkbox" name="hab_sw[]" value="PHP"> PHP<br>
            <input type="checkbox" name="hab_sw[]" value="JavaScript"> JavaScript<br>
            <input type="checkbox" name="hab_sw[]" value="MySQL"> MySQL<br>
            <input type="checkbox" name="hab_sw[]" value="Python"> Python
        </p>
        
        <p>
            <label>Habilidades Hardware:</label><br>
            <input type="radio" name="hab_hw" value="Básico" checked> Básico<br>
            <input type="radio" name="hab_hw" value="Intermedio"> Intermedio<br>
            <input type="radio" name="hab_hw" value="Avanzado"> Avanzado
        </p>
        
        <p>
            <label>Subir archivo TXT:</label><br>
            <input type="file" name="archivo_txt">
        </p>
        
        <p>
            <input type="submit" value="Guardar">
        </p>
        
    </form>
</body>
</html>

<?php
}
?>