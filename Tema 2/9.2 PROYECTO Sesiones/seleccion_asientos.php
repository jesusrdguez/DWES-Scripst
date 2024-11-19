<?php
session_start();
include 'funciones.php'; // Incluir el array de películas

// Recuperamos la id de la película y el horario seleccionado
$pelicula_id = $_GET['pelicula_id'];  // Este es el valor de la URL

// Verificamos si la película seleccionada existe en la sesión
if (!isset($pelicula_id) || !isset($peliculas[$pelicula_id])) {
    header('Location: index.php');
    exit;
}

// Si la sesión está correctamente configurada, obtenemos la película
$pelicula = $peliculas[$pelicula_id];  // Usamos directamente el valor de $pelicula_id recibido

// Guardamos la película seleccionada en la sesión
$_SESSION['pelicula_id'] = $pelicula_id;
$_SESSION['pelicula_nombre'] = $pelicula['nombre'];

// Recuperamos el horario seleccionado de la URL
$horario = $_GET['horario'];  // Este es el valor de la URL

// Verificamos si el horario es válido
if (!isset($peliculas[$pelicula_id]['horarios'][$horario])) {
    header('Location: index.php');
    exit;
}

// Obtenemos los asientos actuales para esa película y horario
$asientos_disponibles = [];
$asientos_ocupados = [];

foreach ($peliculas[$pelicula_id]['horarios'][$horario]['asientos'] as $asiento => $estado) {
    // Separar los asientos entre libres y ocupados
    if ($estado === 'libre') {
        $asientos_disponibles[] = $asiento;
    } else {
        $asientos_ocupados[] = $asiento;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Selecciona tus asientos</title>
</head>

<body>
    <h1>Selecciona tus asientos para la película: <?= $_SESSION['pelicula_nombre'] ?> | Horario: <?= $horario ?></h1>

    <form action="pago.php" method="POST">
        <input type="hidden" name="pelicula_id" value="<?= $pelicula_id ?>">
        <input type="hidden" name="horario" value="<?= $horario ?>">

        <h3>Asientos disponibles:</h3>
        <div>
            <?php
            // Mostramos todos los asientos
            foreach ($peliculas[$pelicula_id]['horarios'][$horario]['asientos'] as $asiento => $estado):
                if ($estado === 'libre'): ?>
                    <!-- Asientos libres: checkbox habilitado -->
                    <label>
                        <input type="checkbox" name="asientos[]" value="<?= $asiento ?>"> <?= $asiento ?>
                    </label><br>
                <?php else: ?>
                    <!-- Asientos ocupados: checkbox deshabilitado -->
                    <label>
                        <input type="checkbox" disabled> <?= $asiento ?> (Ocupado)
                    </label><br>
                <?php endif;
            endforeach;
            ?>
        </div>

        <button type="submit">Continuar con la compra</button>
    </form>
</body>

</html>
