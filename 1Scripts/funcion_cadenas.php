<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nom1 = "Franco";
        $nom2 = "Pepe";
        echo "La longitud del nombre $nom1 es de " . strlen($nom1) . " caracteres<br>";

        $array = explode("n", $nom1);
        foreach($array as $valor) {
            echo $valor . " ";
        }
        echo "<br>";
        print_r(array_values($array));
        print_r(array_keys($array));

        echo (count($array));
    ?>
</body>
</html>
