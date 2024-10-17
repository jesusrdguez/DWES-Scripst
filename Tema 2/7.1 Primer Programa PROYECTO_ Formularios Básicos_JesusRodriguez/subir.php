<?php 
// Mostramos el contenido del array $_FILES, que contiene información sobre los archivos subidos mediante un formulario.
// Utilizamos <pre> para mantener el formato y print_r() para imprimirlo de manera legible.
echo "<pre>";
print_r($_FILES);
echo "</pre>";

// Comprobamos si el nombre del archivo subido es "subir.php".
// Esto es una verificación muy específica; normalmente se valida el nombre del archivo para asegurar que sea un tipo de archivo permitido.
if ($_FILES["archivo"]["name"] == "subir.php") {
    echo "Se ha subido correctamente"; // Mensaje de éxito si el archivo subido tiene el nombre correcto.
} 

// Comprobamos si el nombre del archivo está vacío, lo que indica que no se ha subido ningún archivo.
if ($_FILES["archivo"]["name"] == "") {
    echo "No se ha subido el archivo solicitado"; // Mensaje de error si no se ha subido ningún archivo.
}
?>
