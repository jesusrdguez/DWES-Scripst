<?php
// Mostramos el contenido del array $_POST, que contiene los datos enviados desde el formulario.
// print_r() se utiliza para imprimir el array de manera legible, y <pre> permite que la salida mantenga el formato.
echo "<pre";
print_r($_POST);
echo "</pre>";

// Aquí comprobamos si el campo 'valor' ha sido enviado y no está vacío.
// La función isset() asegura que la variable está definida, y la comparación con '' garantiza que no esté vacía.
if (isset($_POST['valor']) && $_POST['valor'] !== '') {
    // Asignamos el valor recibido a la variable $valor.
    $valor = $_POST['valor'];

    // Validamos si el valor es alfabético (solo letras).
    // La función ctype_alpha() devuelve verdadero si todos los caracteres son letras.
    if (ctype_alpha($valor)) {
        echo "El valor solo contiene letras (alfabético).";
    }
    // Validamos si el valor es alfanumérico (letras y/o números).
    // La función ctype_alnum() devuelve verdadero si todos los caracteres son letras o números.
    elseif (ctype_alnum($valor)) {
        echo "El valor contiene letras y/o números (alfanumérico).";
    }
    // Validamos si el valor solo contiene dígitos.
    // La función ctype_digit() devuelve verdadero si todos los caracteres son dígitos.
    elseif (ctype_digit($valor)) {
        echo "El valor solo contiene dígitos.";
    }
    // Si no cumple ninguna de las condiciones anteriores, indicamos que contiene caracteres especiales.
    else {
        echo "El valor contiene caracteres especiales o no es alfabético, alfanumérico o numérico.";
    }
} else {
    // Si el campo 'valor' no ha sido introducido, mostramos un mensaje indicando que no se ha proporcionado un valor.
    echo "No se ha introducido ningún valor.";
}
?>
