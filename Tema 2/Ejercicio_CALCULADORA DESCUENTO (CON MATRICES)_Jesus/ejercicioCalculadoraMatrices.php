<?php
// Definir las constantes
define("DESCUENTO_PEQUENO", 0.10); // 10% de descuento
define("LIMITE_DESCUENTO", 50); // Si el total supera 50€, se aplica descuento
define("LIMITE_COMPRA_GRANDE", 100); // Si el total supera 100€, se considera una compra grande

// Matriz que contiene los productos
$productos = [
    ["nombre" => "PlayStation 5 Pro", "cantidad" => 10, "precio_unitario" => 799.99],
    ["nombre" => "Xbox Series X", "cantidad" => 5, "precio_unitario" => 499.99],
    ["nombre" => "Nintendo Switch OLED", "cantidad" => 3, "precio_unitario" => 349.99],
];

// Inicializar variables para la salida final
$salida = "";
$salidaResumen = "";

foreach ($productos as $producto) {
    $nombreProducto = $producto["nombre"];
    $cantidad = $producto["cantidad"];
    $precioUnitario = $producto["precio_unitario"];
    
    // Calcular el total sin descuento
    $totalSinDescuento = $cantidad * $precioUnitario;

    // Comprobar si se aplica un descuento
    if ($totalSinDescuento > LIMITE_DESCUENTO) {
        $descuento = $totalSinDescuento * DESCUENTO_PEQUENO;
        $totalConDescuento = $totalSinDescuento - $descuento;
    } else {
        $descuento = 0;
        $totalConDescuento = $totalSinDescuento;
    }

    // Determinar si es una compra grande
    $tipoCompra = ($totalSinDescuento > LIMITE_COMPRA_GRANDE) ? "Compra grande" : "Compra normal";

    // Formatear los precios a dos decimales
    $precioUnitarioFormateado = number_format($precioUnitario, 2);
    $totalSinDescuentoFormateado = number_format($totalSinDescuento, 2);
    $totalConDescuentoFormateado = number_format($totalConDescuento, 2);

    // Construir la salida
    $salida .= "<p><i>Producto:</i> $nombreProducto</p>" .
               "<p><i>Cantidad:</i> $cantidad</p>" .
               "<p><i>Precio por unidad:</i> $precioUnitarioFormateado €</p>";
    
    $salidaResumen .= "<p><i>Producto:</i> $nombreProducto</p>" .
                      "<p><i>Total sin descuento:</i> $totalSinDescuentoFormateado €</p>" .
                      "<p><i>Total con descuento:</i> $totalConDescuentoFormateado €</p>" .
                      "<p><i>Tipo de compra:</i> <b>$tipoCompra</b></p>";

    if ($descuento > 0) {
        $salidaResumen .= "<p><i>% Descuento aplicado %</i></p>";
    } else {
        $salidaResumen .= "<p><i>% Descuento NO aplicado %</i></p>";
    }
}

// Mostrar la salida
echo "<h2>Detalles de los Productos</h2>";
echo $salida;
echo "<h2>Resumen de la Compra</h2>";
echo $salidaResumen;
?>
