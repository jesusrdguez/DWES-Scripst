<?php
// Mostramos todos los datos enviados en el formulario.
// Utilizamos <pre> para facilitar la lectura del array y print_r() para imprimirlo de forma legible.
echo '<pre>';
print_r($_POST); // Muestra los datos enviados mediante el método POST en formato legible.
echo '</pre>';

// Asignamos los valores de los campos a las variables correspondientes.
// Utilizamos $_REQUEST para acceder a las variables, permitiendo recoger datos de GET o POST.
$nombre = $_REQUEST["nombre"]; // Capturamos el valor del nombre.
$comentario = $_REQUEST["comentario"]; // Capturamos el comentario.
$intereses = $_REQUEST["intereses"] ?? "No se ha seleccionado ningún interés"; // Capturamos los intereses, asignando un valor por defecto si no se han seleccionado.
$genero = $_REQUEST["genero"] ?? "No se ha seleccionado ningún género"; // Capturamos el género, asignando un valor por defecto si no se ha seleccionado.
$pais = $_REQUEST["pais"]; // Capturamos el país.

echo "Nombre: $nombre <br>"; // Mostramos el nombre.
echo "Comentario: $comentario <br>"; // Mostramos el comentario.
echo "Contraseña: (oculta)<br>"; // Muestra que la contraseña está oculta por razones de seguridad.
echo "Interés: $intereses <br>"; // Mostramos el interés o el mensaje por defecto.
echo "Género: $genero <br>"; // Mostramos el género o el mensaje por defecto.
echo "País: $pais <br>"; // Mostramos el país seleccionado.
?>
