<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $a = 15;
    $b = 7;

    # Función calculador que llama a otra función y devuelve el retorno de aquella
    function calculador($operacion, $num1, $num2) {
        $resultado = $operacion($num1, $num2);
        return $resultado;
    }

    function sumar($num1, $num2) {
        return $num1 + $num2;
    }

    # Función dividir con validación de datos
    function dividir($num1, $num2) {
        if (!is_numeric($num1) || !is_numeric($num2)) {
            return "Is not a digit";
        } elseif ($num1 === 0 || $num2 === 0) {
            return "No se puede dividir entre cero";
        } else {
            return $num1 / $num2;
        }
    }

    $r1 = calculador("dividir", $a, $b);
    echo ($r1);
    ?>
</body>

</html>