<?php
// Mostramos el contenido de los arrays $_GET, $_POST y $_REQUEST, que contienen los datos enviados desde el formulario.
// Utilizamos print_r() para imprimir cada array de manera legible, y <pre> mantiene el formato en la salida.
echo '<pre>';
print_r($_GET); // Muestra los datos enviados mediante el método GET.
print_r($_POST); // Muestra los datos enviados mediante el método POST.
print_r($_REQUEST); // Muestra todos los datos enviados, tanto por GET como por POST.
echo '</pre>';

// Asignamos los valores de los campos 'nombre', 'email' y 'edad' a las variables correspondientes.
// Utilizamos $_REQUEST, que permite acceder a las variables que provienen de ambos métodos (GET y POST).
$nombre = $_REQUEST["nombre"]; // Capturamos el valor del nombre.
$email = $_REQUEST["email"]; // Capturamos el valor del email.
$edad = $_REQUEST["edad"]; // Capturamos el valor de la edad.

// Mostramos los valores capturados en la página.
echo "Nombre: $nombre <br>"; // Mostramos el nombre.
echo "Email: $email <br>"; // Mostramos el email.
echo "Edad: $edad <br>"; // Mostramos la edad.
?>
