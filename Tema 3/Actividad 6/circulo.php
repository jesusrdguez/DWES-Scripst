<?php

// Crea subclases como Circulo, Rectangulo, Triangulo que hereden de Figura y 
// sobreescriban el método calcularArea() para calcular el área de cada figura.

class Circulo extends Figura 
{
    protected int $radio;

    public function __construct(string $color, int $radio)
    {
        parent::__construct($color);
        $this->radio = $radio;
    }

    public function calcularArea(): float
    {
        return (pi() * $this->radio^2);
    }

    public function obtenerInformacion(): array
    {
        return [
            'color' => $this->color,
            'base' => $this->radio
        ];
    }
}

?>