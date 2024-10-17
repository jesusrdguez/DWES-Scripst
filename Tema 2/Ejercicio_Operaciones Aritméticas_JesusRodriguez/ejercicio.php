<?php 
    echo '<h3>Ejercicio 1</h3>';
    $anchoRectangulo = 10;
    $altoRectangulo = 5;
    $perimetro = (2*$anchoRectangulo + 2*$altoRectangulo);
    echo '<p>El per&iacutemetro del rect&aacute es de: ' . $perimetro . 'cm</p>';

    echo '<h3>Ejercicio 2</h3>';
    $divisor = 9;
    $dividendo = 14;
    $cociente = ($dividendo/$divisor);
    $resto = ($dividendo%$divisor);
    echo "<p>Cociente: $dividendo/$divisor = $cociente<p>";
    echo "<p>Resto: $dividendo/$divisor = $resto</p>";

    echo '<h3>Ejercicio 3</h3>';
    $a = 1;
    echo "<p>Variable pre-incremento: " . ++$a . "</p>";
    echo "<p>Variable post-incremento: " . $a++ . "</p>";

    echo '<h3>Ejercicio 4</h3>';
    $variableRedonda = 1.565245;
    echo "<p>Variable redondeada a dos decimales: " . round($variableRedonda,2) . "</p>";

    echo '<h3>Ejercicio 5</h3>';
    echo "<p>3<sup>4</sup> = " . 3**4 . "</p>";

    echo '<h3>Ejercicio 6</h3>';
    $numeroAleatorio = mt_rand(1, 100);
    echo "<p>N&uacutemero aleatorio generado: $numeroAleatorio</p>";

    echo '<h3>Ejercicio 7</h3>';
    $a = 5;
    $b = "5";
    if ($a == $b) {
        echo "<p>$a y $b valen lo mismo</p>";
    } else if ($a === $b) {
        echo "<p>$a y $b son identicos en valor y en tipo</p>";
    } else {
        echo "<p>$a y $b no son lo mismo ni en broma</p>";
    }

    echo '<h3>Ejercicio 8</h3>';
    $j = 1409043.08430843;
    echo "<p>N&uacutemero formateado: " . number_format($j, 3) . "</p>";

    echo '<h3>Ejercicio 9</h3>';
    if ($numeroAleatorio >= 10 && $numeroAleatorio <= 20) {
        echo "<p>$numeroAleatorio est&aacute entre 10 y 20</p>";
    } else {
        echo "<p>$numeroAleatorio no est&aacute entre 10 y 20</p>";
    }

    echo '<h3>Ejercicio 10</h3>';
    $x = "hola";
    echo "<p>Caracter sin incremento: " . $x . "</p>";
    $x++;
    echo "<p>Caracter con incremento: " . $x . "</p>";

?>
