<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function hoopCount(int $n): string {
        return $n >= 10 ? 'Great, now move on to tricks' : 'Keep at it until you get it';
    }


    function hero(int $bullets, int $dragons): bool {
        return (floor($bullets / 2) >= $dragons);
    }

    # Grabar array desde un número > 1 hasta 1
    function reverseSeq(int $n): array {
        $array = array();
        for ($i = $n; $i > 0; $i--) {
            $array[] = $i;
        }
        return $array;
    }

    # range(inicio, fin) crea un array con los valores desde inicio hasta fin
    # Si inicio > fin, el array se genera en orden descendente automáticamente
    function reverseSeqPRO ($n) {
        return range($n, 1);
    };

    # Dado un número $num, devuélvelo siempre negativo
    function makeNegative($num) {
        return $num > 0 ? $num - ($num*2) : $num;
    }


    # Comprobar si hay un valor (string o number) dentro de un array que puede contener strs o numbers
    function solution($a, $x) {
        if (!is_array($a)) { //Validación que sea array
            return false;
        }
        return in_array($x, $a, true); 
    }
 /* - in_array($valor, $array, $modo_estricto):
    Busca si $valor existe dentro del array $array.
    Devuelve true si lo encuentra, false si no.
- El tercer parámetro (true) activa el **modo estricto**, lo que significa
  que compara también el tipo de dato, no solo el valor.
  Ejemplo:
      in_array("2", [2, 3, 4], true) → false  (string ≠ número)
      in_array("2", [2, 3, 4], false) → true  (compara solo valor)
*/



    # Dado un array: devuelve cantidad de nums positivos, suma de negativos y si está vacío devuelve vacío
    function countPositivesSumNegatives($input) {
        $conteoPos = 0;
        $sumaNegativos = 0;
        if (empty($input)) {
            return [];
        }

        for ($i = 0; $i <= count($input) - 1; $i++) {
            if ($input[$i] > 0) {
                $conteoPos += 1;
            } else {
                $sumaNegativos += $input[$i];
            }
        }

        return [$conteoPos, $sumaNegativos];
    }

    // Muestra la primera palabra de un array
    function getAge($response) {
        $arrayPartido = explode(" ", $response);
        return $arrayPartido[0];
    }

    // Suma de los elementos de un array
    function sumArray($array) {
        sort($array);
        $suma = 0;

        if (is_null($array) or empty($array) or count($array) <= 2) {
            return $suma;
        } else {
            for ($i = 1; $i < count($array) - 1; $i++) {
                $suma += $array[$i];
            }
        }
        return (int) $suma;
    }
    ?>
</body>

</html>