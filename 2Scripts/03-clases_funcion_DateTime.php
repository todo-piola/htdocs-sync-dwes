<?php

class Person {
    protected $firstName; // public, protected <-> private
    protected $lastName;
    protected $nickname;
    protected $fechaNacimiento;
    protected $changedNickname = 0;

    public function __construct($firstName, $lastName, $fechaNacimiento) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    // Agrega validación adicional para que el usuario sólo pueda agregar nicknames que tengan al menos 2 caracteres y no sean igual a su nombre o apellido.
    public function setNickname($nickname) {
        if ($this->changedNickname >= 2) {
            throw new Exception("You can't change a nickname more than 2 times");
        }

        if (
            strlen($nickname) >= 2
            && $nickname !== $this->firstName
            && $nickname !== $this->lastName
        ) {
            $this->changedNickname++;
            $this->nickname = $nickname;
        } else {
            throw new Exception("Invalid nickname: too short or same as name/lastname");
        }
    }

    public function getNickname() {
        return $this->nickname;
    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function calcularEdad() {
        try {
            // Creamos un objeto DateTime a raiz de parametro YYYY-mm-dd
            $fechaComprobar = new DateTime($this->fechaNacimiento);
        } catch (Exception $e) {
            // Si falla porque el parametro es erroneo devuelve esto
            throw new Exception("Formato de fecha inválido: " . $e->getMessage());
        }
        // Creamos objeto DateTime con diversos atributos en el
        $hoy = new DateTime();


        /*  Se crea variable $edad de tipo DateInterval con las siguientes propiedades:
            y:  Number of years.
            m:  Number of months.
            d:  Number of days.
            h:  Number of hours.
            i:  Number of minutes.
            s:  Number of seconds.
            days:   total number of full days between the start and end dates.*/
        $edad = $fechaComprobar->diff($hoy);

        // Invocamos estas propiedades y las escribimos por pantalla
        echo "Tienes " . $edad->y . " años y " . $edad->m . " meses y " . $edad->d;
    }
}

$person1 = new Person('Duilio', 'Palacios', "1995-06-20");
$person1->calcularEdad();

$person1->setNickname('Silence');

exit($person1->getNickname());
