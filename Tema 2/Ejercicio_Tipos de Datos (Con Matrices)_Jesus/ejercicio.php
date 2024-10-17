<style>
    h3 {
        color: purple;
    }
</style>

<?php
echo "<h3>Ejercicio 1</h3>"; 
$colores = array("rojo", "azul", "verde", "blanco", "negro");
echo "<p style= 'color: green'>$colores[2]</p>";

echo "<h3>Ejercicio 2</h3>";
$coche = ["marca" => "Tesla", "modelo" => "X", "año" => 2024];
echo "<p>Modelo del coche: " . $coche["modelo"]. "</p>";

echo "<h3>Ejercicio 3</h3>";
$estudiantes = [
    ["nombre" => "Juanito", "edad" => 19, "nota" => 5.5],
    ["nombre" => "Alfonso", "edad" => 18, "nota" => 8],
    ["nombre" => "Pablo", "edad" => 23, "nota" => 4.7]
];

echo "<p>Nombre del segundo estudiante: " . $estudiantes[1]["edad"] . "</p>";

echo "<h3>Ejercicio 4</h3>";
$weekDays = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
echo "<pre>";
print_r($weekDays);
echo "</pre>";

echo "<h3>Ejercicio 5</h3>";
$numbers = [1, 2, 3];
$numbers[] = 4;
$numbers[] = 5;
echo "<pre>";
print_r($numbers);
echo "</pre>";

echo "<h3>Ejercicio 6</h3>";
$fruits = ["apple", "banana", "watermelon"];
$vegetables = ["onion","carrot","potato"];
$health = array_merge($fruits, $vegetables);
echo "<pre>";
print_r($health);
echo "</pre>";

echo "<h3>Ejercicio 7</h3>";
$values = ["good morning", "good evening", "good nigth"];
echo "<p>Number of values: " . count($values) . "</p>";

echo "<h3>Ejercicio 8</h3>";
$values2 = [1, 2, 3, 4, 5];
unset($values2[2]);
echo "<p>Third position value removed</p>";

echo "<h3>Ejercicio 9</h3>";
$example = ["hello", "hi"];
$exampleCopy = $example;
echo "<pre>";
print_r($exampleCopy);
echo "</pre>";

echo "<h3>Ejercicio 10</h3>";
define("SPEEDOFLIGHT", 299792458);
echo "<p>Speed of light: " . SPEEDOFLIGHT . "m/s</p>";

echo "<h3>Ejercicio 11</h3>";
define("MAXNEWSNUMBER", 5);
echo "<p>Max news number: " . MAXNEWSNUMBER . "</p>";

echo "<h3>Ejercicio 12</h3>";
echo PHP_VERSION;

echo "<h3>Ejercicio 13</h3>";
echo "<pre>";
print_r(get_defined_constants());
echo "</pre>";

?>
