<?php

// Crea subclases como Circulo, Rectangulo, Triangulo que hereden de Figura y 
// sobreescriban el método calcularArea() para calcular el área de cada figura.

class Triangulo extends Figura 
{
    protected int $base;
    protected int $altura;

    public function __construct(string $color, int $base, int $altura)
    {
        parent::__construct($color);
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea(): float
    {
        return ($this->base * $this->altura)/2   ;
    }

    public function obtenerInformacion(): array
    {
        return [
            'color' => $this->color,
            'base' => $this->base,
            'altura' => $this->altura
        ];
    }
}

?>