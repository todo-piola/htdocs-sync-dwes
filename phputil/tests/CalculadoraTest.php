<?php
use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
    public function testSuma()
    {
        $this->assertEquals(7, Calculadora::sumar(3, 4));
    }

    public function testResta()
    {
        $this->assertEquals(1, Calculadora::restar(5, 4));
    }

    public function testMultiplicacion()
    {
        $this->assertEquals(20, Calculadora::multiplicar(5, 4));
    }

    public function testDivision()
    {
        $this->assertEquals(2, Calculadora::dividir(10, 5));
    }

    public function testDivisionPorCero()
    {
        $this->expectException(InvalidArgumentException::class);
        Calculadora::dividir(10, 0);
    }
}
