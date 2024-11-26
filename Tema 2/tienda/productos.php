<?php
session_start();

require_once("matriz_funciones.php");

inicializar_productos();

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

    header("Location: " . $_SERVER['PHP_SELF']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <?php foreach ($_SESSION['productos'] as $id => $producto): ?>
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
    <a href="cerrar_sesion.php">Cerrar sesi&oacute;n</a>
</body>

</html>