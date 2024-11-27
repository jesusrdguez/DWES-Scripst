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
    echo "<a href='main.php'>Volver a la tienda</a>";
    exit;
}

$productos = $_SESSION['productos'];
$carrito = $_SESSION['carrito'];

$total = 0 ;

echo "<a href='main.php'>Página principal</a>";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <h1>Confirmar compra</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php foreach ($carrito as $id => $producto): ?>
            <tr>
                <td><?php echo $id; ?></td>
                <?php foreach ($producto as $precio => $valor): ?>
                    <td><?php echo $precio; ?> €</td>
                    <td><?php echo $valor; ?></td>
                    <td><?php echo $precio * $valor; ?> €</td>
                    <?php $total += $precio * $valor?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        <h3>Total: <?php echo "$total"?> €</h3>
    </table>
    <form method="post" action="generar_resumen.php">
        <input type="submit" value="Descargar ticket">
    </form>
    <a href="carrito.php">Volver</a>
</body>

</html>