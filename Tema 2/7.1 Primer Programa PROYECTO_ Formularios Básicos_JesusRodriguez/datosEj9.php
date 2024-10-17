<?php
// Mostramos el contenido del array $_POST, que contiene los datos enviados desde el formulario.
// Utilizamos print_r() para imprimir el array de manera legible, y <pre> para darle formato y facilitar su lectura.
// Nota: Falta cerrar correctamente el tag <pre>, debería ser "<pre>" en lugar de "<pre".
echo "<pre";
print_r($_POST);
echo "</pre>";

// Aquí comprobamos si los campos 'email' y 'url' han sido enviados en el formulario mediante el método POST.
// Utilizamos isset() para verificar que ambas variables estén definidas y no sean nulas.
if (isset($_POST['email']) && isset($_POST['url'])) {
    
    // Asignamos los valores enviados desde el formulario a las variables $email y $url.
    $email = $_POST['email'];
    $url = $_POST['url'];

    // Validamos el correo electrónico.
    // Utilizamos filter_var() con FILTER_VALIDATE_EMAIL para verificar si el formato del correo es válido.
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico es válido: $email <br><br>";
    } else {
        echo "El correo electrónico no es válido. <br><br>";
    }

    // Validamos la URL.
    // Utilizamos filter_var() con FILTER_VALIDATE_URL para verificar si el formato de la URL es válido.
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        echo "La URL es válida: $url <br><br>";
    } else {
        echo "La URL no es válida. <br><br>";
    }
} else {
    // En caso de que no se hayan enviado ambos campos, mostramos un mensaje solicitando el ingreso de un correo y una URL.
    echo "Por favor, introduce tanto un correo electrónico como una URL.";
}
?>
