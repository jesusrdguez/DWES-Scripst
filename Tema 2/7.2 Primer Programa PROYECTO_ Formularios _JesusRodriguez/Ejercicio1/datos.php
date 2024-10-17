<?php

permutacion($_POST);

/**
 * Función que permuta todos los elementos
 * de una matriz
 * @param mixed $array
 * @return void
 */
function permutacion($array)
{
    echo "Tus datos originales son:<br>";
    foreach ($array as $numero) {
        echo "$numero";
    }
    echo "<br><br>";
    $arrayInvertido = array_reverse($array);
    echo "Tus datos invertidos son:<br>";
    foreach ($arrayInvertido as $numero) {
        echo "$numero";
    }
    echo "<br><br>";
    echo "<a href='ejercicio_uno.html'>Volver al inicio</a>";
}

?>