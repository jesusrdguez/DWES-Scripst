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

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="estilo.css">
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
        <?php foreach ($carrito as $id => $producto): ?>
            <tr>
                <td><?php echo $id; ?></td>
                <?php foreach ($producto as $precio => $valor): ?>
                    <td><?php echo $precio; ?> €</td>
                    <td><?php echo $valor; ?></td>
                    <td><?php echo $precio * $valor; ?> €</td>
                    <td>
                        <form method="post">
                            <input type="submit" name="eliminar" value="Eliminar">
                        </form>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <form method="post" action="confirmar_compra.php">
        <input type="submit" value="Realizar Compra">
    </form>
    <form method="post">
        <input type="submit" name="reiniciar" value="Vaciar Carrito"> <!-- Botón para reiniciar el carrito -->
    </form>
    <a href="main.php">Volver</a>
</body>

</html>