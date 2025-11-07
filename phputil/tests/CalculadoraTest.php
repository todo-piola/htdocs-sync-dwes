<?php
use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
    public function testSuma()
    {
        $resultado = Calculadora::sumar(3, 4);
        $this->assertEquals(7, $resultado);

        // Nuevos asserts
        $this->assertLessThan(10, $resultado, 'La suma debería ser menor que 10');
        $this->assertGreaterThan(5, $resultado, 'La suma debería ser mayor que 5');
    }

    public function testResta()
    {
        $resultado = Calculadora::restar(5, 4);
        $this->assertEquals(1, $resultado);
        $this->assertLessThan(5, $resultado, 'El resultado debería ser menor que 5');
    }

    public function testMultiplicacion()
    {
        $resultado = Calculadora::multiplicar(5, 4);
        $this->assertEquals(20, $resultado);
        $this->assertGreaterThan(10, $resultado, 'El resultado debería ser mayor que 10');
    }

    public function testDivision()
    {
        $resultado = Calculadora::dividir(10, 5);
        $this->assertEquals(2, $resultado);
        $this->assertLessThan(3, $resultado, 'El resultado debería ser menor que 3');
    }

    public function testDivisionPorCero()
    {
        $this->expectException(InvalidArgumentException::class);
        Calculadora::dividir(10, 0);
    }

    public function testNombreClase()
    {
        $nombre = 'Calculadora PHP';
        // assertStringStartsWith → el nombre debe comenzar con "Calculadora"
        $this->assertStringStartsWith('Calculadora', $nombre, 'El nombre debe empezar por "Calculadora"');
    }
}
