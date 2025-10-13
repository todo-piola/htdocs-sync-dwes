<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    function dividir($a, $b) {
        if ($b == 0){
            throw new Exception("El segundo argumento es 0");
        }
        return $a / $b;
    }

    try{
        $resultado = dividir(5, 0);
        echo "Resul 1 $resultado<br>";
    } catch(Exception $e) {
        echo "Excepción: " . $e->getMessage() . "<br>";
    }finally{
        echo "Primer finally";
    }

    try{
        $resul2 = dividir(5, 2);
        echo "Resul 2 $resul2 <br>";
    } catch(Exception $e){
        echo "Excepción: " . $e->getMessage() . "<br>";
    } finally {
        echo "Segundo finally";
    }
?>
</body>
</html>