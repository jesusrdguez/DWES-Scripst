<?php
session_start();

$nombre_usuario = $_SESSION['usuario'];

require_once("productos.php");

$productos = $_SESSION['productos'];

// Agregar producto al carrito
if (isset($_POST['agregar'])) {
    $id = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // Inicializar el carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Agregar o actualizar cantidad en el carrito
    $_SESSION['carrito'][$id][$precio] = ($_SESSION['carrito'][$id][$precio] ?? 0) + $cantidad;

    header("Location: " . $_SERVER['PHP_SELF']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <p style="color: red">PARA AGREGAR UNA PRENDA AL CARRITO HAY QUE PULSAR UNA VEZ EL BOTÓN.
        NO TE VA A LLEVAR DIRECTAMENTE AL CARRITO, SINO QUE VAS A TENER QUE
        IR AGREGANDO UNO A UNO LOS PRODUCTO. CUANDO HAYAS AGREGADO TODOS
        LOS ARTÍCULOS DESEADOS, PULSA EN EL ENLACE DE 'VER CARRITO'</p>
    <h2>¡Bienvenid@ a mi tienda, <?= $nombre_usuario ?>!</h2>
    <h1>Productos</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Agregar</th>
        </tr>
        <?php foreach ($productos as $categoria => $subcategorias): ?>
            <?php foreach ($subcategorias as $subcategoria => $items): ?>
                <?php foreach ($items as $id => $producto): ?>
                    <tr>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['precio']; ?> €</td>
                        <td>
                            <form method="post">
                                <input type="number" name="cantidad" value="1" min="1">
                                <input type="hidden" name="nombre" value="<?php echo $producto['nombre']; ?>">
                                <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                                <input type="submit" name="agregar" value="Agregar">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <a href="carrito.php">Ver carrito</a>
        <a href="cerrar_sesion.php">Cerrar sesi&oacute;n</a>
</body>

</html>