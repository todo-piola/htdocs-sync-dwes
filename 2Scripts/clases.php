<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class Mascota {
        private $tipo;

        public function __construct($tipo) {
            $this->tipo = $tipo;
        }

        public function getTipo() {
            return $this->tipo;
        }
    }

    class Gato extends Mascota {
        private $color;
        private $peso;

        public function __construct($color, $peso) {
            parent::__construct("Gato");
            $this->$color = $color;
            $this->$peso = $peso;
        }

        public function getColor() {
            return $this->color;
        }

        public function getPeso() {
            return $this->peso;
        }

        public function __toString() {
            return "Color:" . $this->getColor() . "Peso: " . $this->getPeso();
        }
    }


    $rigo = new Gato("Negro", 4.5);
    echo $rigo;
    ?>
</body>

</html>