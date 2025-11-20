<?php
class Superheroe {
    // promoted properties -> PHP 8.0
    public function __construct(
        public readonly string $name,
        public readonly string $poderes,
        public readonly string $planeta,
    ) {
    }

    public function descripcion() {
        return "$this->name es un superheroe que proviene de $this->planeta y sus poderes son: $this->poderes";
    }
}

$hero = new Superheroe("Batman", "Dinero y tecnología", "Krypton");
echo $hero->descripcion();