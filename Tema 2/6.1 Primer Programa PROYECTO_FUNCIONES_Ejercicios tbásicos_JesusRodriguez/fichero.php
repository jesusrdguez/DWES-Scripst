<style>
    body {
        font-size: xx-large;
        background-color: #0C223F;
        color: aqua;
    }
</style>

<?php 

/**
 * Calculo del volumen de un cilindro dado su altura y radio
 * @param mixed $h
 * @param mixed $r
 * @return int
 */
function calculoVolumenCilindro($h, $r) {
    return pi() * ($r ** 2) * $h; // Cambié ^ a ** para la potencia
    
}

echo "Volumen cilindro: " . round(calculoVolumenCilindro(5, 10), 3) . "m<sup>3</sup>";

echo "<br><br>";

/**
 * Suma de tres números dados
 * @param mixed $n1
 * @param mixed $n2
 * @param mixed $n3
 * @return mixed
 */
function sumaNumeros($n1, $n2, $n3) {
    return $n1 + $n2 + $n3;
}

echo "Suma de 3 números: " . sumaNumeros(1, 2, 3);

echo "<br><br>";

function productoNumeros($n1, $n2, $n3) {
    return $n1 * $n2 * $n3;
}

echo "Producto de 3 números: " . productoNumeros(1,2,3);

echo "<br><br>";

/**
 * Elimino un número específico de elementos aleatorios de un array
 * @param array $array Array de números
 * @param int $numElementos Cantidad de elementos a eliminar
 * @return bool Indica si la acción se realizó correctamente
 */
function eliminarNumero(&$array, $numElementos = 1) {
    if ($numElementos > count($array) || $numElementos < 1) {
        return false; // Si se quiere eliminar más elementos de los que hay, o menos de uno
    }

    for ($i = 0; $i < $numElementos; $i++) {
        $index = array_rand($array); // Obtiene un índice aleatorio
        unset($array[$index]); // Elimina el elemento en el índice aleatorio
    }

    $array = array_values($array); // Reindexa el array
    return true; // La acción se realizó correctamente
}

$arrayNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$eliminados = eliminarNumero($arrayNumeros, 3);
echo "Eliminación exitosa: " . ($eliminados ? 'Sí' : 'No') . "<br>";
echo "Array después de la eliminación: ";
print_r($arrayNumeros);

?>