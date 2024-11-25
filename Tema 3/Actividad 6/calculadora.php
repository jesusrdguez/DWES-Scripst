<?php 

require_once('figura.php');
require_once('cuadrado.php');
require_once('triangulo.php');
require_once('circulo.php');

// Crear instancias de empleados
$miCuadrado = new Cuadrado("Rojo", 10, 5);
$miTriangulo = new Triangulo("Amarillo", 10, 5);
$miCirculo = new Circulo("Azul", 5);

// Mostrar los resultados de los sueldos de los empleados
echo "Área de mi cuadrado: " . number_format($miCuadrado->calcularArea(), 2, ',', '.') . " cm<sup>2</sup>\n";
echo "Área de mi triángulo: " . number_format($miTriangulo->calcularArea(), 2, ',', '.') . " cm<sup>2</sup>\n";
echo "Área de mi circulo: " . number_format($miCirculo->calcularArea(), 2, ',', '.') . " cm<sup>2</sup>\n";

// Mostrar la información detallada de cada empleado
echo "\nInformación de mi cuadrado:\n";
print_r($miCuadrado->obtenerInformacion());

echo "\nInformación de mi triángulo:\n";
print_r($miTriangulo->obtenerInformacion());

echo "\nInformación de mi camión:\n";
print_r($miCirculo->obtenerInformacion());

// Clonación de miCuadrado
$figuraClonada = $miCuadrado->clonarFigura();
echo "\nClonación de mi cuadrado:\n";
print_r($figuraClonada->obtenerInformacion());


?>