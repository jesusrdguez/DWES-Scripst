<?php

require_once('vehiculo.php');
require_once('coche.php');
require_once('moto.php');

// Crear instancias de empleados
$miCoche = new Coche("Ford", "Fiesta", 2005);
$miMoto = new Moto("Indian", "Roadmaster", 1998);
$miCamion = new Camion("Volvo", "FM", 2000);

// Mostrar los resultados de los sueldos de los empleados
echo "Impuesto de mi moto: " . number_format($miCoche->calcularImpuesto(), 2, ',', '.') . " EUR\n";
echo "Impuesto de mi coche: " . number_format($miMoto->calcularImpuesto(), 2, ',', '.') . " EUR\n";
echo "Impuesto de mi camión: " . number_format($miCamion->calcularImpuesto(), 2, ',', '.') . " EUR\n";

// Mostrar la información detallada de cada empleado
echo "\nInformación de mi coche:\n";
print_r($miCoche->obtenerInformacion());

echo "\nInformación de mi moto:\n";
print_r($miMoto->obtenerInformacion());

echo "\nInformación de mi camión:\n";
print_r($miCamion->obtenerInformacion());

// Clonación de miCoche
$vehiculoClonado = $miCoche->clonarVehiculo();
echo "\nClonación de mi coche:\n";
print_r($vehiculoClonado->obtenerInformacion());


?>