<?php
/**
 * Libreria para el inventario
 */


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

?>