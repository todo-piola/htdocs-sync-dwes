<?php

namespace App;  

class Calculadora
{
    public static function sumar($a, $b)
    {
        return $a + $b;
    }

    public static function restar($a, $b)
    {
        return $a - $b;
    }

    public static function multiplicar($a, $b)
    {
        return $a * $b;
    }

    public static function dividir($a, $b)
    {
        if ($b == 0) {
            throw new InvalidArgumentException("No se puede dividir entre 0");
        }
        return $a / $b;
    }
}
