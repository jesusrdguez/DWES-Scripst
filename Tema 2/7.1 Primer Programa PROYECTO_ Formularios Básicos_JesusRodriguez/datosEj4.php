<?php
// Mostramos el contenido del array $_POST, que contiene los datos enviados mediante el método POST desde el formulario.
// Utilizamos <pre> para mantener el formato y print_r() para imprimirlo de manera legible.
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Comprobamos si se ha enviado el botón de saludo.
// La función isset() verifica si la variable existe y no es nula.
if (isset($_POST["saludo"])) {
    // Si el botón de saludo ha sido presionado, mostramos un mensaje indicando que se ha saludado.
    print "<p>Usted ha saludado</p>";
} 
// Comprobamos si se ha enviado el botón de despedida.
elseif (isset($_POST["despedida"])) {
    // Si el botón de despedida ha sido presionado, mostramos un mensaje indicando que se ha despedido.
    print "<p>Usted se ha despedido</p>";
}
?>
