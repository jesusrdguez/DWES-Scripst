<?php
session_start();

// Productos disponibles
$productos = [
    1 => ['nombre' => 'Producto 1', 'precio' => 10],
    2 => ['nombre' => 'Producto 2', 'precio' => 20],
    3 => ['nombre' => 'Producto 3', 'precio' => 30],
];

// Agregar producto al carrito
if (isset($_POST['agregar'])) {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];

    // Inicializar el carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Agregar o actualizar cantidad en el carrito
    $_SESSION['carrito'][$id] = ($_SESSION['carrito'][$id] ?? 0) + $cantidad;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
</head>

<body>
    <h1>Productos</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Agregar</th>
        </tr>
        Incrustamos el código php utilizando sus etiquetas correpondientes
        
        <?php foreach ($productos as $id => $producto): ?>
            <tr>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['precio']; ?> €</td>
                <td>
                    <form method="post">
                        <input type="number" name="cantidad" value="1" min="1">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="agregar" value="Agregar">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="carrito.php">Ver carrito</a>
</body>

</html>