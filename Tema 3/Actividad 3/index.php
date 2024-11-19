<?php 

// Utilizar la clase Coche proporcionada: Esta clase ya define los atributos (marca, modelo, velocidad)
// y los métodos (constructor, acelerar, frenar).
// Crear un objeto Coche: Instancia un nuevo objeto de
// la clase Coche con una marca y modelo de tu elección.
// Simular un viaje: Utiliza los métodos acelerar y frenar para modificar la velocidad del coche.
// Mostrar la velocidad final: Imprime en pantalla la velocidad final del coche 
// después de las aceleraciones y frenadas.

require_once 'class.php';

$miCoche = new Coche("Dacia", "Sandero");

$acelarar = 5;
$velociadInicial = $miCoche->getVelocidad();

echo "Velocidad inicial: $velociadInicial <br>";

do 
{
    $miCoche->acelerar(1);
    $acelarar--;
} while ($acelarar > 0);

$velocidadFinal = $miCoche->getVelocidad();

echo "Velocidad final: $velocidadFinal"

?>