<?php

class Mascota {

    function sonido() {
        echo 'Ruido inconcluso,...';
    }
}

class Gato extends Mascota {
    private $peso;

    public function __construct($peso)
    {
        $this->peso = $peso;
    }

    function sonido_personalizado() {
        echo "Yo hago MEOOW";
    }

    /**
     * Get the value of peso
     */ 
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set the value of peso
     *
     * @return  self
     */ 
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }
}

$Rigo = new Gato(6);
echo  $Rigo -> getPeso() . " KG es el peso <br>";
$Rigo -> sonido_personalizado();