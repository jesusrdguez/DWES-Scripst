<?php
    /**
     * Este script genera y muestra un número aleatorio entre 1 y 6
     * cada vez que se recarga la página.
     */
    echo "<p>Recargue la página para que aparezca un nuevo número</p>";
    echo "<br>";
    $var = rand(1, 6);
    echo "<p><strong>Número random: $var</strong></p>";
?>
