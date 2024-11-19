<?php
session_start(); // Necesario para acceder a la sesión
include 'funciones.php'; // Incluye el array con las películas y los asientos

// Verificamos si se ha recibido el formulario para realizar el pago
if (isset($_POST['realizar_pago']) && isset($_POST['pelicula_id'], $_POST['horario'], $_POST['asientos'])) {

    $pelicula_id = $_POST['pelicula_id']; // ID de la película seleccionada
    $horario = $_POST['horario']; // Horario seleccionado
    $asientos = $_POST['asientos']; // Asientos seleccionados por el usuario

    // Calcular el precio total (10€ por asiento)
    $precio_por_asiento = 10;
    $total = count($asientos) * $precio_por_asiento;

    // Marcar los asientos como ocupados en el array de películas (en la sesión)
    foreach ($asientos as $asiento) {
        // Cambiar el estado de los asientos seleccionados a "ocupado"
        $_SESSION['peliculas'][$pelicula_id]['horarios'][$horario]['asientos'][$asiento] = 'ocupado';
    }

    // Guardamos el resumen de la compra en la sesión para mostrarlo al usuario
    $_SESSION['resumen_compra'] = [
        'pelicula_nombre' => $_SESSION['pelicula_nombre'], // Nombre de la película (guardado en la sesión)
        'horario' => $horario, // Horario seleccionado
        'asientos' => $asientos, // Asientos seleccionados
        'total' => $total // Precio total
    ];

    // Aquí creamos el contenido del archivo .txt
    $contenido = "Resumen de tu compra:\n\n";
    $contenido .= "Película: " . $_SESSION['pelicula_nombre'] . "\n";
    $contenido .= "Horario: " . $horario . "\n";
    $contenido .= "Asientos seleccionados: " . implode(", ", $asientos) . "\n";
    $contenido .= "Total: " . $total . "€\n";

    // Nombre del archivo a generar
    $nombre_archivo = 'resumen_compra_' . $_SESSION['pelicula_nombre'] . '_' . date('Y-m-d_H-i-s') . '.txt';

    // Forzamos la descarga del archivo .txt
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $nombre_archivo . '"');
    header('Content-Length: ' . strlen($contenido));

    // Enviamos el contenido al navegador (esto descargará el archivo)
    echo $contenido;
    exit; // Esto termina el script, pero la descarga ya se ha iniciado
}

// Si no se recibe el formulario de pago, redirigimos al usuario a la página principal
header("Location: seleccion_asientos.php");
exit;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resumen de Compra</title>
</head>

<body>
    <h1>Resumen de tu compra</h1>

    <?php if (isset($_SESSION['resumen_compra'])): ?>
        <p>Película: <?= $_SESSION['resumen_compra']['pelicula_nombre'] ?></p>
        <p>Horario: <?= $_SESSION['resumen_compra']['horario'] ?></p>
        <p>Asientos seleccionados: <?= implode(', ', $_SESSION['resumen_compra']['asientos']) ?></p>
        <p>Total: <?= $_SESSION['resumen_compra']['total'] ?>€</p>

        <!-- Botón de realizar pago (y descargar el ticket .txt) -->
        <form action="pago.php" method="POST">
            <input type="hidden" name="pelicula_id" value="<?= $_POST['pelicula_id'] ?>">
            <input type="hidden" name="horario" value="<?= $_POST['horario'] ?>">
            <input type="hidden" name="asientos[]" value="<?= implode('" /><input type="hidden" name="asientos[]" value="', $_POST['asientos']) ?>">

            <button type="submit" name="realizar_pago">Realizar pago</button>
        </form>
    <?php else: ?>
        <p>No se ha encontrado un resumen de compra válido.</p>
    <?php endif; ?>

</body>

</html>
