<?php

// Crea una clase abstracta Figura con propiedades como color y un método abstracto calcularArea().

abstract class Figura
{
    protected string $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public abstract function calcularArea(): float;

    public function clonarFigura(): Figura
    {
        return clone $this;
    }

    // Método para obtener información sobre el empleado
    public abstract function obtenerInformacion(): array;
}

?>