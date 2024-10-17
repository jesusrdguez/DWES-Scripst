<style>
    body {
        font-family: 'Consolas', 'monaco', 'monospace';
        background-color: #333333;
        color: #87CEEB;
        font-size: 16;
    }
</style>

<?php

require_once('inventory_operations.php');

// Definimos los arrays para el inventario actual, proveedor A y proveedor B
$inventario_actual = [
    ["producto" => "Teclado", "precio" => 20, "categoria" => "Electrónica", "cantidad" => 4],
    ["producto" => "Ratón", "precio" => 15, "categoria" => "Electrónica", "cantidad" => 10],
    ["producto" => "Monitor", "precio" => 100, "categoria" => "Electrónica", "cantidad" => 3],
    ["producto" => "Silla", "precio" => 80, "categoria" => "Muebles", "cantidad" => 5],
];

$proveedor_a = [
    ["producto" => "Ratón", "precio" => 10, "categoria" => "Electrónica", "cantidad" => 20],
    ["producto" => "Lámpara", "precio" => 25, "categoria" => "Iluminación", "cantidad" => 15],
    ["producto" => "Escritorio", "precio" => 50, "categoria" => "Muebles", "cantidad" => 2],
];

$proveedor_b = [
    ["producto" => "Monitor", "precio" => 92, "categoria" => "Electrónica", "cantidad" => 8],
    ["producto" => "Auriculares", "precio" => 30, "categoria" => "Electrónica", "cantidad" => 20],
    ["producto" => "Lámpara", "precio" => 20, "categoria" => "Iluminación", "cantidad" => 5],
];

// Declaramos los arrays que vamos a utilizar en el programa
$productos_actual = array_column($inventario_actual, 'producto');
$productos_proveedor_a = array_column($proveedor_a, 'producto');
$productos_proveedor_b = array_column($proveedor_b, 'producto');

// Diferencia entre el inventario actual y los proveedores a y b
$diferencias_proveedor_a = diferenciasArrays($productos_actual, $productos_proveedor_a);
$diferencias_proveedor_b = diferenciasArrays($productos_actual, $productos_proveedor_b);

// Unión del inventario con redundancias
$inventario_unido = unionRecursivaArrays($inventario_actual, $proveedor_a, $proveedor_b);

// Cogemos las categorías del inventario total
$categorias = array_column($inventario_unido, 'categoria');

// Contamos las categorías que hay
$conteo_categorias = contarArray($categorias);

// Unimos, sin redundancias, ordenamos por precio de cada producto, y calculamos el precio medio 
$resultadoProductosEliminados = ArraySinRedundaciasPrecioOrdenMedia($inventario_actual, $proveedor_a, $proveedor_b);

// Dividimos en secciones el inventario
$secciones_inventario = seccionesDividir($resultadoProductosEliminados, 2);

// Realizamos un informe del inventario
$informe_inventario = informe($resultadoProductosEliminados);

// Mostrar resultados
echo "<pre>Diferencias con el Proveedor A: ";
print_r($diferencias_proveedor_a);
echo "</pre>";

echo "<pre>Diferencias con el Proveedor B: ";
print_r($diferencias_proveedor_b);
echo "</pre>";

echo "<pre>Inventario unido sin eliminar duplicados: ";
print_r($inventario_unido);
echo "</pre>";

echo "<pre>Conteo de productos por categoría: ";
print_r($conteo_categorias);
echo "</pre>";

echo "<pre>Inventario único eliminando duplicados, sumando cantidades y promediando precios: ";
print_r($resultadoProductosEliminados);
echo "</pre>";

echo "<pre>Secciones del inventario: ";
print_r($secciones_inventario);
echo "</pre>";

echo "<pre>Informe del Inventario final: ";
print_r($informe_inventario);
echo "</pre>";

?>