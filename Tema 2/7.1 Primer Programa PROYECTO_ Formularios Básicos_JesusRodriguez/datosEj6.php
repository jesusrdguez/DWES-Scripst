<?php 
// Mostramos el contenido del array $_POST, que contiene los datos enviados mediante el método POST desde el formulario.
// Utilizamos <pre> para mantener el formato y print_r() para imprimirlo de forma legible.
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Comprobamos si el valor recibido en 'numero' es numérico y si es un número entero.
// La función is_numeric() verifica si el valor es un número o una cadena que puede convertirse en número (incluyendo decimales).
// La función ctype_digit() verifica si todos los caracteres de la cadena son dígitos, es decir, un número entero positivo.
if (is_numeric($_POST["numero"]) && ctype_digit($_POST["numero"])) {
    echo "El dato es un número (is_numeric & ctype_digit)"; // Mensaje de éxito si ambos chequeos son verdaderos.
} else {
    echo "El dato no se trata de un número"; // Mensaje de error si no cumple las condiciones anteriores.
}
?>
