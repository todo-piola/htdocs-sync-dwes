<?php

class Hero {
    private string $name;
    public int $level;
    protected array $powers;

    public function attack() {
        return "$this->name lanza un ataque!";
    }
}