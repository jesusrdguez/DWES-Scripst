<?php

// Clase abstracta Empleado
// PD: public attributes of a class can be accessed everywhere. 
// A private attribute can only be accessed in the class where it is ubicated. 
// A protected attribute means another class as son class can use the attribute
// using the right methods

abstract class Empleado
{
    protected string $nombre;
    protected string $apellido;
    protected float $salario;

    // Constructor que inicializa las propiedades de un empleado
    public function __construct(string $nombre, string $apellido, float $salario)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->salario = $salario;
    }

    // Método abstracto para calcular el sueldo (debe ser implementado por las subclases)
    public abstract function calcularSueldo(): float;

    // Método para obtener información sobre el empleado
    public function obtenerInformacion(): array
    {
        return [
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'salario' => $this->salario,
            'metodos' => get_class_methods($this)
        ];
    }

    // Método para clonar un empleado (crea una copia exacta)
    public function clonarEmpleado(): Empleado
    {
        return clone $this;
    }
}

// Subclase EmpleadoTiempoCompleto
class EmpleadoTiempoCompleto extends Empleado
{
    private float $bono;

    // Constructor que también incluye el bono adicional para empleados a tiempo completo
    public function __construct(string $nombre, string $apellido, float $salario, float $bono)
    {
        parent::__construct($nombre, $apellido, $salario);
        $this->bono = $bono;
    }

    // Sobrescribe el método calcularSueldo() para calcular el sueldo de tiempo completo
    public function calcularSueldo(): float
    {
        return $this->salario + $this->bono;
    }
}

// Subclase EmpleadoPorHoras
class EmpleadoPorHoras extends Empleado
{
    private float $horasTrabajadas;
    private float $tarifaPorHora;

    // Constructor que incluye las horas trabajadas y la tarifa por hora
    public function __construct(string $nombre, string $apellido, float $salario, float $horasTrabajadas, float $tarifaPorHora)
    {
        parent::__construct($nombre, $apellido, $salario);
        $this->horasTrabajadas = $horasTrabajadas;
        $this->tarifaPorHora = $tarifaPorHora;
    }

    // Sobrescribe el método calcularSueldo() para calcular el sueldo por horas
    public function calcularSueldo(): float
    {
        return $this->horasTrabajadas * $this->tarifaPorHora;
    }
}

// Crear instancias de empleados
$empleado1 = new EmpleadoTiempoCompleto("Juan", "Pérez", 3000, 500);
$empleado2 = new EmpleadoPorHoras("María", "López", 0, 160, 20);

// Mostrar los resultados de los sueldos de los empleados
echo "Sueldo de Juan (Tiempo Completo): " . number_format($empleado1->calcularSueldo(), 2, ',', '.') . " EUR\n";
echo "Sueldo de María (Por Horas): " . number_format($empleado2->calcularSueldo(), 2, ',', '.') . " EUR\n";

// Mostrar la información detallada de cada empleado
echo "\nInformación de Juan (Empleado Tiempo Completo):\n";
print_r($empleado1->obtenerInformacion());

echo "\nInformación de María (Empleado Por Horas):\n";
print_r($empleado2->obtenerInformacion());

// Clonación de empleado1
$empleadoClon = $empleado1->clonarEmpleado();
echo "\nClonación de Juan (Empleado Clonado):\n";
print_r($empleadoClon->obtenerInformacion());
?>