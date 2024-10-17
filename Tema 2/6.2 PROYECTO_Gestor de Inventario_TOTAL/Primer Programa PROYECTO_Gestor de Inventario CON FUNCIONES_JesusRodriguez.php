<style>
    body {
        font-family: 'Consolas', 'monaco', 'monospace';
        background-color: #333333;
        color: #87CEEB;
        font-size: 16;
    }
</style>

<?php

// Definir arrays para el inventario actual, proveedor A y proveedor B
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

/**
 * Función que compara dos arrays
 * @param mixed $array1 
 * @param mixed $array2
 * @return array Devuelve la diferencia
 */
function diferenciasArrays($array1, $array2)
{
    return array_diff((array) $array1, (array) $array2);
}

/**
 * Función que une recursivamente 3 arrays
 * @param mixed $array1
 * @param mixed $array2
 * @param mixed $array3
 * @return array Array unido
 */
function unionRecursivaArrays($array1, $array2, $array3)
{
    return array_merge_recursive($array1, $array2, $array3);
}

/**
 * Función que cuenta la cantidad de valores en un array
 * @param mixed $array
 * @return array
 */
function contarArray($array)
{
    return array_count_values($array);
}

/**
 * Función que une 3 arrays sin redundancias, ordenas los productos 
 * por precio, y hace la media de este
 * @param mixed $array1
 * @param mixed $array2
 * @param mixed $array3
 * @return array retorna un array con lo ya mencionado
 */
function ArraySinRedundaciasPrecioOrdenMedia($array1, $array2, $array3)
{
    $inventario_unido = unionRecursivaArrays($array1, $array2, $array3);

    // Extraer los precios
    $precios = array_column($inventario_unido, 'precio');

    // Ordenar los precios y aplicar ese orden al array de productos unidos
    sort($precios);
    $array_ordenado = array();
    foreach ($precios as $precio) {
        foreach ($inventario_unido as $elemento) {
            if ($elemento['precio'] == $precio) {
                $array_ordenado[] = $elemento;
                break;
            }
        }
    }

    // Eliminar productos duplicados
    $resultadoProductosEliminados = [];
    foreach ($inventario_unido as $item) {
        $clave = $item['producto'] . '|' . $item['categoria']; // Crear una clave única por producto y categoría

        if (!isset($resultadoProductosEliminados[$clave])) {
            $resultadoProductosEliminados[$clave] = [
                'producto' => $item['producto'],
                'categoria' => $item['categoria'],
                'total_precio' => 0,
                'total_cantidad' => 0,
            ];
        }

        $resultadoProductosEliminados[$clave]['total_precio'] += $item['precio'] * $item['cantidad'];
        $resultadoProductosEliminados[$clave]['total_cantidad'] += $item['cantidad'];
    }
    foreach ($resultadoProductosEliminados as $clave => $datos) {
        $resultadoProductosEliminados[$clave]['precio_promedio'] = $datos['total_precio'] / $datos['total_cantidad'];
        unset($resultadoProductosEliminados[$clave]['total_precio']);

    }
    return array_values($resultadoProductosEliminados); // Reindexar el array
}

/**
 * Función que divide un array en secciones que 
 * contienen x ($numSecciones) cantidades de elementos
 * @param mixed $array
 * @param mixed $numSecciones
 * @return array
 */
function seccionesDividir($array, $numSecciones)
{
    return array_chunk($array, $numSecciones);
}

/**
 * Función que genera un informe del inventario total
 * @param mixed $array
 * @return array[]
 */
function informe($array)
{
    $informe_inventario = [];
    foreach ($array as $item) {
        $informe_inventario[$item['producto']] = [
            "precio" => $item['precio_promedio'],
            "cantidad" => $item['total_cantidad'],
            "categoria" => $item['categoria'],
        ];
    }
    return $informe_inventario;
}


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