<style>
    body {
        font-family: 'Courier New', Courier, monospace;
        background-image: url("img/wp11871138.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
    }

    h2 {
        color: white;
    }

    p {
        font-weight: bold;
        color: white;
    }

    #contenedor {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 10px;
    }

    .cuadrados {
        background: rgb(0, 0, 0);
        height: fit-content;
        padding: 1em;
        text-align: center;
    }
</style>

<?php

echo "<div id='contenedor'>";

echo "<div class='cuadrados'>";
echo "<h2>Ejercicio 1</h2>";
for ($i = 1; $i <= 3; $i++) {  // Bucle exterior para $i con valores del 1 al 3
    echo "<p>Valor de \$i: $i</p>";

    for ($j = 'a'; $j <= 'd'; $j++) {  // Bucle interior para $j con valores de 'a' a 'd'
        echo "<p>Valor de \$j: $j</p>";
    }

    echo "<br>";  // Añade un salto de línea para separar cada ciclo de $i
}
echo "</div>";

echo "<div class='cuadrados'>";
echo "<h2>Ejercicio 2</h2>";
for ($i = 1; $i <= 3; $i++) {
    // Se genera un número aleatorio entre el 1 y el 6
    $dadoUno = mt_rand(1, 6);
    echo "<p>Numer&iacuten del primer dado: $dadoUno</p>";
    // Los dados serán lanzados la cantidad de veces
    // determinadas por el dado uno
    for ($j = 1; $j <= $dadoUno; $j++) {
        $dadoDos = mt_rand(1, 6);
        echo "<p>Numer&iacuten del segundo dado: $dadoDos</p>";
    }
    echo "<br>";
}
echo "</div>";

echo "<div class='cuadrados'>";
echo "<h2>Ejercicio 3</h2>";
// Creamos variables diferentes para el número
// (generado aleatoriamente), y para el factorial.
// Este será calculada multiplicando el rango de números
// comprendidos entre 1 y el número generando
$num1 = mt_rand(1, 100);
$factorial = 1;
for ($i = 1; $i <= $num1; $i++) {
    $factorial *= $i;
}
echo "<p>$num1! = $factorial</p>";
echo "</div>";
echo "</div>";

?>