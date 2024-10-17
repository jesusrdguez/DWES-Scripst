<style>
    body {
        background-image: url("img/pngtree-video-store-that-has-much-to-choose-from-picture-image_2652600.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: scroll;
        padding-top: 80px;
    }

    h1 {
        color: wheat;
        margin-left: 15px;
    }

    #cabecera {
        background-color: #654321;
        width: 100%;
        padding: .5em;
        left: 0;
        top: 0;
        position: fixed;
    }

    #contenedorNotas {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 20px;
    }

    .nota {
        background-image: url("img/vintage-scrapbook-old-paper-textured-grunge-blank-of-notes-for-planner-notebook-journal-free-png.webp");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        width: 400px;
        padding: 20px;
        margin: 1em;
        margin-top: 0;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 300px;
    }

    #resumenCompra {
        min-height: 500px;
        height: auto;
    }

    .nota h3 {
        text-align: center;
        font-size: 1.5em;
    }

    .nota p {
        font-size: 1.2em;
    }
</style>

<?php
/**
 * Este script genera una interfaz de compra para un producto específico.
 * Se muestran los detalles del producto, así como un resumen de la compra,
 * incluyendo la posibilidad de aplicar un descuento basado en el total de la compra.
 */

// Definimos las variables para el producto
$nombreProducto = "PlayStation 5 Pro"; // Nombre del producto
$cantidad = 10; // Cantidad del producto
$precioUnitario = 799.99; // Precio unitario del producto
$tieneDescuento = false; // Variable que indica si se aplica un descuento

// Calculamos el total sin descuento
$totalSinDescuento = $cantidad * $precioUnitario;

// Comprobamos si el total sin descuento supera 50 para aplicar un descuento del 10%
if ($totalSinDescuento > 50) {
    $descuento = ($totalSinDescuento * 10 / 100); // Calculamos el descuento
    $tieneDescuento = true; // Marcamos que se aplica un descuento
} else {
    $descuento = 0; // No hay descuento
}

// Calculamos el total con descuento
$totalConDescuento = $totalSinDescuento - $descuento;

// Creamos el contenido HTML para los detalles de la compra
$datos = "<p><i>Producto:</i> " . $nombreProducto . "</p>" . PHP_EOL .
    "<p><i>Cantidad:</i> " . $cantidad . "</p>" . PHP_EOL .
    "<p><i>Precio por unidad:</i> " . $precioUnitario . "</p>";

// Creamos el contenido HTML para el resumen de la compra
$compra = "<p><i>Producto:</i> " . $nombreProducto . "</p>" . PHP_EOL .
    "<p><i>Precio por unidad:</i> " . $precioUnitario . "</p>" . PHP_EOL . 
    "<p><i>Total sin descuento:</i> " . number_format($totalSinDescuento, 2) . "€</p>" . PHP_EOL . 
    "<p><i>Total con descuento:</i> " . number_format($totalConDescuento, 2) . "€</p>";

// Comprobamos si el total sin descuento es mayor que 100 para clasificar la compra
if ($totalSinDescuento > 100) {
    $compra = $compra . PHP_EOL . "<p><i>Tipo compra: </i><b>Compra grande</b></p>";
} else {
    $compra = $compra . PHP_EOL . "<p><i>Tipo compra: </i><b>Compra normal</b></p>";
}

// Añadimos información sobre el descuento
if ($tieneDescuento) {
    $compra = $compra . PHP_EOL . "<p>% Descuento aplicado %</p>";
} else {
    $compra = $compra . PHP_EOL . "<p>% Descuento NO aplicado %</p>";
}

echo "<div id='cabecera'>";
echo "<h1>PixelParadise Videogames Shop</h1>";
echo "</div>";

// Creamos el contenedor para las notas
echo "<div id='contenedorNotas'>";

// Creamos la nota para los detalles de la compra
echo "<div class='nota' id='datosCompra'>";
echo "<div class='texto'>";
echo "<h3>Datos compra</h3>";
echo $datos; // Mostramos los datos del producto
echo "</div>";
echo "</div>";

// Creamos la nota para el resumen de la compra
echo "<div class='nota' id='resumenCompra'>";
echo "<div class='texto'>";
echo "<h3>Resumen compra</h3>";
echo $compra; // Mostramos el resumen de la compra
echo "</div>";
echo "</div>";

// Cerramos el contenedor de notas
echo "</div>";
?>
