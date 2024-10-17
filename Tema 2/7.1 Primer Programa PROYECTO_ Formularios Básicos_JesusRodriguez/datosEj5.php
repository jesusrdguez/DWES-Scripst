<?php 
// Mostramos el contenido del array $_REQUEST, que contiene todos los datos enviados desde el formulario, tanto de GET como de POST.
// Utilizamos <pre> para mantener el formato y print_r() para imprimirlo de forma legible.
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

// Comprobamos si ambos campos, 'nombre' y 'email', están vacíos.
// La función empty() verifica si una variable está vacía o no existe.
if (empty($_REQUEST["nombre"]) && empty($_REQUEST["email"])) {
    echo "No se ha introducido ningún dato"; // Mensaje si no se ha introducido nada.
} 
// Comprobamos si solo el campo 'nombre' está vacío.
elseif (empty($_REQUEST["nombre"])) {
    // Si el nombre está vacío, mostramos el email (si existe) y un mensaje de error.
    echo "Email: $_REQUEST[email]"; // Mostramos el email ingresado.
    echo "<br>";
    echo "No se ha introducido el nombre"; // Mensaje de error para el nombre.
} 
// Comprobamos si solo el campo 'email' está vacío.
elseif (empty($_REQUEST["email"])) {
    // Si el email está vacío, mostramos el nombre (si existe) y un mensaje de error.
    echo "Nombre: $_REQUEST[nombre]"; // Mostramos el nombre ingresado.
    echo "<br>";
    echo "No se ha introducido el email"; // Mensaje de error para el email.
} else {
    // Si ambos campos tienen valores, los mostramos.
    echo "Nombre: $_REQUEST[nombre]"; // Mostramos el nombre.
    echo "<br>";
    echo "Email: $_REQUEST[email]"; // Mostramos el email.
}
?>
