<?php

class Coche extends Vehiculo
{
    protected int $impuesto = 100;

    public function __construct(string $marca, string $modelo, int $anio)
    {
        parent::__construct($marca, $modelo, $anio);
    }

    public function calcularImpuesto(): float
    {
        return $this->impuesto;
    }
}

?>