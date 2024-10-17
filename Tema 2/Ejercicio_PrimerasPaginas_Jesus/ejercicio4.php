<?php
    /**
     * Este script genera un emoticono aleatorio utilizando códigos Unicode
     * y lo muestra en un tamaño grande y centrado en la página.
     */
    $emoticono = rand(128512, 128586);
    echo "<p style='font-size: 50px; text-align: center'>&#$emoticono</p>";
?>
