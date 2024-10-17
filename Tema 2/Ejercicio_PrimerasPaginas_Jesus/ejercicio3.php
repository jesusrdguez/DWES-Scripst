<?php 
    /**
     * Este script genera un color RGB aleatorio y muestra
     * el mensaje "¡Hola, mundo!" con ese color.
     */
    echo "<p>Recargue la página para ver un nuevo color.</p>";
    echo "<br>";
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);
    $color = "rgb($red, $green, $blue)";

    echo "<p style = 'color: $color'>¡Hola, mundo!</p>";
?>
