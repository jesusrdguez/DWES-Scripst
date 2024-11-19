<?php

class Coche
{
    private string $marca;
    private string $modelo;
    private int $velocidad = 0;

    public function __construct(string $marca = "Ford", string $modelo = "Fiesta")
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function acelerar(int $cantidad)
    {
        if ($cantidad > 0)
            $this->velocidad += $cantidad;
    }

    public function frenar(int $cantidad)
    {
        if (($this->velocidad - $cantidad) >= 0)
            $this->velocidad -= $cantidad;
        else
            $this->velocidad = 0;
    }

    public function getVelocidad()
    {
        return $this->velocidad;
    }

}

?>