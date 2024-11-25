<?php

abstract class Vehiculo
{
    protected string $marca;
    protected string $modelo;
    protected int $anio;

    public function __construct(string $marca, string $modelo, int $anio)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anio = $anio;
    }

    public abstract function calcularImpuesto(): float;

    public function clonarVehiculo(): Vehiculo
    {
        return clone $this;
    }


    // Método para obtener información sobre el empleado
    public function obtenerInformacion(): array
    {
        return [
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'anio' => $this->anio,
            'metodos' => get_class_methods($this)
        ];
    }

}

?>