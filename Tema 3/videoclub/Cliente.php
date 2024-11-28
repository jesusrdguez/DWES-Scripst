<?php

// tieneAlquilado(Soporte $s): bool → Recorre el array de soportes y comprueba si está el soporte
// alquilar(Soporte $s): bool -→ Debe comprobar si el soporte está alquilado y si no ha superado el cupo de alquileres.
// Al alquilar, incrementará el numSoportesAlquilados y almacenará el soporte en el array. Para cada caso debe mostrar un mensaje informando de lo ocurrido.
// devolver(int $numSoporte): bool → Debe comprobar que el soporte estaba alquilado y actualizar la cantidad de soportes
// alquilados. Para cada caso debe mostrar un mensaje informando de lo ocurrido
// listarAlquileres(): void → Informa de cuantos alquileres tiene el cliente y los muestra.

class Cliente
{
    protected string $nombre;
    protected int $numero;
    protected $soportesAlquilados = array();
    protected int $numSoportesAlquilados;
    protected int $maxAlquilerConcurrente;

    function __construct(string $nombre, int $numero, int $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function tieneAlquilado(Soporte $s): bool
    {
        foreach ($this->soportesAlquilados as $soporte) {
        }
        return false;
    }

    // alquilar(Soporte $s): bool -→ Debe comprobar si el soporte está alquilado y si no ha superado el cupo de alquileres.
    // Al alquilar, incrementará el numSoportesAlquilados y almacenará el soporte en el array. Para cada caso debe mostrar un mensaje informando de lo ocurrido.
    public function alquilar(Soporte $s): bool
    {   
        $this->soportesAlquilados.array_push($s);
        return false;
    }

    public function devolver(int $numSoporte): bool
    {
        return false;
    }

    public function listarAlquileres() {}

    public function setNumero(int $numero)
    {
        $this->numero = $numero;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getNumSoportesAlquilados(): int
    {
        return $this->numSoportesAlquilados;
    }
}
