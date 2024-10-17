<?php

if ($_POST["numero"] >= 1 && $_POST["numero"] <= 10) {
    echo "Número de elementos: $_POST[numero]<br>";
    echo "Introduzca los elementos a tratar:<br>";
    $elementos = $_POST["numero"];
    echo "<form action='datos.php' method='post'>";
    for ($i = 0; $i < $elementos; $i++) {
        echo "<input type='text' name='valor_$i' size='3' required>";
    }
    echo "<br><br>";
    echo "<input type='submit' value='Enviar'>";
    echo "<input type='reset' value='Borrar'>";
    echo "</form>";
    echo "<br>";
    echo "<a href='ejercicio_uno.html'>Volver al inicio</a>";
} else {
    echo "El valor es incorrecto. Debe ser un número entre 1 y 10";
    echo "<br><br>";
    echo "<a href='ejercicio_uno.html'>Volver al inicio</a>";
}

?>