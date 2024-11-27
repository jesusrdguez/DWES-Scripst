<?php
session_start();

// Verificar si el carrito está vacío
if (empty($_SESSION['carrito'])) {
    echo "El carrito está vacío.";
    exit;
}

// Obtener los productos del carrito y sus detalles
$productos = $_SESSION['productos'];
$carrito = $_SESSION['carrito'];

// Inicializar el contenido del archivo .txt
$contenido = "Resumen de la compra\n\n";

// Calcular el total
$total = 0;
foreach ($carrito as $id => $producto) {
    $nombre_producto = $id;
    foreach ($producto as $precio => $valor) {
        $precio_producto = $precio;
        $cantidad_producto = $valor;
        $subtotal_producto = $precio * $valor;
        $contenido .= "Producto: $nombre_producto\nCantidad: $cantidad_producto\nPrecio: $precio_producto €\nSubtotal: $subtotal_producto €\n\n";
        $total += $precio * $valor;
    }
}
// Añadir el total al final
$contenido .= "Total: $total €\n";

// Definir el nombre del archivo
$nombre_archivo = "resumen_compra.txt"; // El nombre incluirá un timestamp para hacerlo único

// Establecer las cabeceras para forzar la descarga del archivo
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="' . $nombre_archivo . '"');
header('Content-Length: ' . strlen($contenido));

// Enviar el contenido del archivo al navegador
echo $contenido;


// Finalizar el script
exit;
?>