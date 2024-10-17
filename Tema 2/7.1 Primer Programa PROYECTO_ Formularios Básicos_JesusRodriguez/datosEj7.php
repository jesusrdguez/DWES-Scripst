<?php 
// Mostramos el contenido del array $_GET, que contiene los datos enviados mediante el método GET desde el formulario.
// Utilizamos print_r() para imprimir el array de manera legible, y <pre> mantiene el formato en la salida.
echo "<pre>";
print_r($_GET);
echo "</pre>";

// Comprobamos si el valor de 'texto' en $_GET es un número entero.
// La función is_int() comprueba si el tipo de la variable es entero, pero dado que todos los datos llegan como cadenas,
// esto no funcionará como se espera. Necesitarás convertir el valor a entero para esta comprobación.
if (is_int($_GET["texto"])) {
    echo "El dato es un número entero";
} 
// Verificamos si 'texto' contiene un punto o una coma, lo que indicaría que se trata de un número decimal (float).
// Utilizamos strpos() para buscar la posición de los caracteres "." o "," en la cadena.
elseif (strpos($_GET["texto"], ".") !== false || strpos($_GET["texto"], ",") !== false) {
    echo "El dato se trata de un float";
} 
// Comprobamos si 'texto' es un booleano.
// La función is_bool() verifica si el valor es de tipo booleano. Sin embargo, este caso tampoco funcionará 
// correctamente ya que los valores enviados desde un formulario son cadenas.
elseif (is_bool($_GET["texto"])) {
    echo "El dato se trata de un booleano";
} 
// Finalmente, verificamos si 'texto' es una cadena.
// La función is_string() comprueba si el tipo de la variable es una cadena de texto.
elseif (is_string($_GET["texto"])) {
    echo "El dato se trata de un string";
}
?>
