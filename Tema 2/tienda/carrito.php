<?php
session_start();

// Reiniciar el carrito si se ha enviado la solicitud
if (isset($_POST['reiniciar'])) {
    unset($_SESSION['carrito']); // Vaciar el carrito
}

// Verificar si el carrito está vacío
if (empty($_SESSION['carrito'])) {
    echo "El carrito está vacío.";
    echo "<br>";
    echo "<a href='productos.php'>Volver a la tienda</a>";
    exit;
}

$productos = $_SESSION['productos'];

// Calcular total
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
</head>

<body>
    <h1>Carrito de Compras</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php foreach ($_SESSION['carrito'] as $id => $cantidad): ?>
            <tr>
                <td><?php echo $productos[$id]['nombre']; ?></td>
                <td><?php echo $productos[$id]['precio']; ?> €</td>
                <td><?php echo $cantidad; ?></td>
                <td><?php echo $productos[$id]['precio'] * $cantidad; ?> €</td>
            </tr>
            <?php $total += $productos[$id]['precio'] * $cantidad; ?>
        <?php endforeach; ?>
    </table>
    <h2>Total: <?php echo $total; ?> €</h2>
    <form method="post" action="generar_resumen.php">
        <input type="submit" value="Realizar Compra">
    </form>
    <form method="post">
        <input type="submit" name="reiniciar" value="Reiniciar Carrito"> <!-- Botón para reiniciar el carrito -->
    </form>
    <a href="productos.php">Volver a la tienda</a>
</body>

</html>