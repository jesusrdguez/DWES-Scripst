<style>
    body {
        font-family: 'Consolas', 'monaco', 'monospace';
        background-color: #333333;
        color: #87CEEB;
        font-size: 15;
    }

    h3 {
        color: #5353ec;
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

// Acceder directamente a las columnas "producto" con array_column
$inventarioActual_producto = array_column($inventario_actual, 'producto');

$proveedor_a_producto = array_column($proveedor_a, 'producto');

// Acceder directamente a las columnas "producto" con array_column
$proveedor_b_producto = array_column($proveedor_b, 'producto');

echo '<h3>1. Comparar inventarios de diferentes proveedores</h3>';

// Comparar diferencias de inventario con proveedor A
$diferencias_proveedor_a = array_diff($inventarioActual_producto, $proveedor_a_producto);

// Mostrar resultados
echo "<pre>";
print_r(nl2br("Diferencias del inventario actual con respecto proveedor A:\n"));
print_r($diferencias_proveedor_a);
echo "</pre>";

// Comparar diferencias de inventario con proveedro B
$direfencias_proveedor_b = array_diff($inventarioActual_producto, $proveedor_b_producto);

// Mostrar resultados
echo "<pre>";
print_r(nl2br("Diferencias del inventario actual con respecto proveedor B:\n"));
print_r($direfencias_proveedor_b);
echo "</pre>";

// Comparo los valores y los índices del inventario y del proveedor A
// Si coinciden en clave (valor del índice) y en valor, no se guaradará su resultado 
$diferencias_proveedor_b_proveedor_a_assoc = array_diff_assoc($proveedor_a_producto, $proveedor_b_producto);

// Mostrar resultados
// Los valores de las claves son iguales en todos los valores difieren
/**
 * $proveedor_a_producto = [
 *  "producto" => "Ratón"
 *  "producto" => "Lámpara"
 *  "producto" => "Escritorio"
 * ];
 * 
 *  $proveedor_b_producto = [
 *  "producto" => "Monitor" --------> Coincide la clave pero no el valor
 *  "producto" => "Auriculares" --------> Coincide la clave pero no el valor
 *  "producto" => "Lámpara" --------> Coincide la clave pero no el valor
 * ];
 * 
 * Por lo tanto todos los producto de $proveedor_a_producto serán mostrados al no haber
 * tanto clave como valor coincidentes en ambos.
 */
echo "<pre>";
print_r(nl2br("Diferencias del proveedor B respecto al proveedor A (&iacutendices incluidos):\n"));
print_r($diferencias_proveedor_b_proveedor_a_assoc);
echo "</pre>";

// Comparo la diferencia de valores del inventario actual y el proveedor A
$diferencias_inventario_proveedor_a_key = array_diff_key($inventarioActual_producto, $proveedor_a_producto);

/**
 * Solo se mostraran aquellos valores de los índices
 * que no sean iguales.
 * 
 * En esta ocasión todos los valores de los índices son iguales, 
 * pero se muestra el producto de más del inventario actual.
 */
echo "<pre>";
print_r(nl2br("Diferencias del proveedor B respecto al inventario actual (solo claves):\n"));
print_r($diferencias_inventario_proveedor_a_key);
echo "</pre>";

echo '<br><br>';

echo '<h3>2. Unir y organizar las listas de productos</h3>';

/**
 * Unión de los productos del inventario actual
 * con los productos del del proveedor A
 */
$union_productos = array_merge($inventarioActual_producto, $proveedor_a_producto, $proveedor_b_producto);

/**
 * Unión de los productos del inventario actual
 * con los productos del del proveedor A y B.
 */
$union_productos_2 = array_merge_recursive($inventarioActual_producto, $proveedor_a_producto, $proveedor_b_producto);

/**
 * Realizo las ordenaciones con el segundo array, 
 * ya que el segundo lo utilizaremos más adelante.
 */

// Ordenación de todos los productos
asort($union_productos_2);

// Se muestran los productos ordenados por orden alfabético
echo "<pre>";
print_r(nl2br("Todos los productos ordenados por orden alfab&eacutetico:\n"));
print_r($union_productos_2);
echo "</pre>";

// Ordenación de todos los productos
arsort($union_productos_2);

// Se muestran los productos ordenados por orden alfabético inversamente
echo "<pre>";
print_r(nl2br("Todos los productos ordenados por orden \nalfab&eacutetico de forma inversa:\n"));
print_r($union_productos_2);
echo "</pre>";

echo '<br><br>';

echo '<h3>3. Eliminar productos duplicados</h3>';

// Ahora unimos y ordenamos los productos sin duplicaciones y por orden alfabético
$union_final_productos = array_unique($union_productos_2);

// Volvemos a ordenar
asort($union_final_productos);

echo "<pre>";
print_r(nl2br("Productos sin redundancias en orden alfab&eacutetico:\n"));
print_r($union_final_productos);
echo "</pre>";

echo '<br><br>';

echo '<h3>4. Contar cuántos productos hay de cada categoría</h3>';

/**
 * Unir todas las categorías en un mismo array,
 * y de este contar el número de veces que aparece
 * cada una.
 */

// Guardar las categorías del inventario actual
$inventarioActual_categoria = array_column($inventario_actual, 'categoria');

// Guardar las categorías del proveedor A
$proveedor_a_categoria = array_column($proveedor_a, 'categoria');

// Guardar las categorías del proveedor A
$proveedor_b_categoria = array_column($proveedor_b, 'categoria');

/**
 * Uno todas las categorías en un solo array,
 * sin importar si hay duplicaciones en los valores.
 */
$union_categorias = array_merge($inventarioActual_categoria, $proveedor_a_categoria, $proveedor_b_categoria);

// Vemos si es el resultado deseado
echo "<pre>";
print_r(nl2br("Categorías:\n"));
print_r($union_categorias);
echo "</pre>";

/**
 * Con al función array_count_values contamos el 
 * número de categorías que hay, y por ende los productos
 * que hay en cada categoría
 */
$contador_categorias_productos = array_count_values($union_categorias);

// Comprobamos que cuenta los valores correctamente
echo "<pre>";
print_r(nl2br("Número total de productos que hay por categoría (con duplicaciones):\n"));
print_r($contador_categorias_productos);
echo "</pre>";

echo '<br><br>';

echo '<h3>5. Ordenar los productos por precio</h3>';

/**
 * Crear un array para los productos y otro 
 * para los precios. Una vez creados, combinarlos
 * con la función array_combine(), de modo que 
 * los productos serán la clave de la matriz y 
 * su correspondiente precio el valor.
 */

// Crear un array con los precios del inventario actual
$inventarioActual_precio = array_column($inventario_actual, 'precio');

// Crear un array con los precios del inventario actual
$proveedor_a_precio = array_column($proveedor_a, 'precio');

// Crear un array con los precios del inventario actual
$proveedor_b_precio = array_column($proveedor_b, 'precio');

// Unimos todos los precio en un mismo array
$union_precios = array_merge($inventarioActual_precio, $proveedor_a_precio, $proveedor_b_precio);

/**
 * Uno los array $union_productos, siendo este el índice, 
 * con el array $union_precios, siendo este el valor
 */
$union_productos_precios = array_combine($union_productos, $union_precios);

// Ordeno por precio el array
asort($union_productos_precios);

// Compruebo que el resultado es correcto
echo "<pre>";
print_r(nl2br("Productos ordenados por y con su precio correspondiente:\n"));
print_r($union_productos_precios);
echo "</pre>";

echo '<br><br>';

echo '<h3>6. Dividir el inventario de la tienda en secciones de 2 elementos cada uno</h3>';

/**
 * Utilizo la función array_chunk(), para
 * dividir de dos en dos el array que contiene
 * todos los productos.
 */
$union_productos_v2 = array_chunk($union_productos, 2);

// Compruebo que el resultado es correcto
echo "<pre>";
print_r(nl2br("Productos dividos en secciones de 2:\n"));
print_r($union_productos_v2);
echo "</pre>";

echo '<br><br>';

echo '<h3>7. Buscar y contar elementos en los arrays-->Buscar un producto específico en el inventario (por nombre)</h3>';

$producto_seleccionado = array_rand($union_productos, 8);

/**
 * Utilizar la función array_key() para identificar
 * los valores/productos del array buscados por el usuario.
 */


// Declaro el valor a buscar, este podría ser introducid
// por el mismo usuario
$producto_buscar = "Ratón";

/**
 * Creo un array donde se van a encontrar
 * todos los productos que el usuario busca
 */
$lista_productos_indices = array_keys($union_productos, $producto_buscar);

// Compruebo que el resultado es correcto
echo "<pre>";
print_r(nl2br("Productos \"buscados\" por el usuario:\n"));
/**
 * array_keys() solo me da un array con los índices donde se encuentran
 * los productos a buscar. Por lo que con el siguiente bucle asigno
 * a una variable los índices dados. Esta será el índice donde se 
 * encuentran los productos del array $union_productos.
 */
for ($i = 0; $i<count($lista_productos_indices); $i++) {
    $indice = $lista_productos_indices[$i];
    print_r($union_productos[$indice]);
    echo "<br>";
}
echo "</pre>";

echo '<br>';

// Compruebo que el resultado es correcto
echo "<pre>";
print_r(nl2br("Nº de elementos que coinciden con la búsqueda $producto_buscar:\n"));
print_r(count($lista_productos_indices));
echo "</pre>";

echo "<br><br>";

echo '<h3>8. Reindexar inventario y mostrar los nuevos índices</h3>';


// Crear nuevos productos usando array_fill solo con el nombre del producto
$nuevos_productos = array_fill(0, 5, "Producto nuevo");

// Generar índices únicos para los nuevos productos (opcional, ya que no los usamos aquí)
$nuevos_indices = range(count($union_productos), count($union_productos) + count($nuevos_productos) - 1);

// Unir nuevos productos al array $union_productos
$union_productos_v2 = array_merge($union_productos, $nuevos_productos);

// Compruebo que el resultado es correcto
echo "<pre>";
print_r(nl2br("Inventario actualizado con nuevos productos:\n"));
print_r($union_productos_v2);
echo "</pre>";

// Reindexar los índices del array aunque estos ya se encuentres correctamente indexados
$inventario_reindexado = array_values($union_productos_v2);

// Compruebo que el resultado es correcto
echo "<pre>";
print_r(nl2br("Inventario reindexado:\n"));
print_r($inventario_reindexado);
echo "</pre>";

echo "<br><br>";

echo "<h3>9. Dividir el inventario en secciones más manejables</h3>";

/**
 * Dividir inventario en categorías. En donde se muestra
 * el producto y su correspondiente categoría.
 */
$inventario_producto_categoria = array_combine($union_productos, $union_categorias);

// Inventario mostrando la categoría de cada producto
echo "<pre>";
print_r(nl2br("Producto con su categoría correspondiente:\n"));
print_r($inventario_producto_categoria);
echo "</pre>";

echo "<br><br>";

echo "<h3>10. Generar un informe estadístico del inventario actual (con claves como nombres de productos)</h3>";
    
/**
 * Generar un informe estadístico del inventario actual:
 * 1. Mostrar productos, categorías, precios, y cantidades
 * 2. Calcular el valor total del inventario
 * 3. Calcular el precio promedio por categoría
 */

// 1. Crear un array asociativo con claves como nombres de productos
$informe_inventario = [];
foreach ($inventario_actual as $item) {
    $informe_inventario[$item['producto']] = [
        'precio' => $item['precio'],
        'categoria' => $item['categoria'],
        'cantidad' => $item['cantidad'],
        'valor_total_producto' => $item['precio'] * $item['cantidad'],
    ];
}

// 2. Calcular el valor total del inventario
$valor_total_inventario = array_sum(array_column($informe_inventario, 'valor_total_producto'));

// 3. Calcular el precio promedio por categoría
$categorias_precios = [];
foreach ($inventario_actual as $item) {
    if (!isset($categorias_precios[$item['categoria']])) {
        $categorias_precios[$item['categoria']] = [
            'precio_total' => 0,
            'productos' => 0,
        ];
    }
    $categorias_precios[$item['categoria']]['precio_total'] += $item['precio'];
    $categorias_precios[$item['categoria']]['productos']++;
}

$promedio_precio_categoria = [];
foreach ($categorias_precios as $categoria => $data) {
    $promedio_precio_categoria[$categoria] = $data['precio_total'] / $data['productos'];
}

// Mostrar el informe
echo "<pre>";
print_r(nl2br("Informe del inventario actual:\n"));
print_r($informe_inventario);
echo nl2br("\nValor total del inventario: $$valor_total_inventario\n");
echo nl2br("\nPromedio de precio por categoría:\n");
print_r($promedio_precio_categoria);
echo "</pre>";


?>