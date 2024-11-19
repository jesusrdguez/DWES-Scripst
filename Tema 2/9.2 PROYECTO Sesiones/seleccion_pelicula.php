<?php
session_start();

include 'funciones.php';

// Recuperamos la id de la película seleccionada
$pelicula_id = $_GET['pelicula_id'];
$pelicula = $peliculas[$pelicula_id];

// Guardamos la película seleccionada en la sesión
$_SESSION['pelicula_id'] = $pelicula_id;
$_SESSION['pelicula_nombre'] = $pelicula['nombre'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Seleccionar Horario</title>
</head>

<body>
    <h1>Selecciona un horario para la película: <?= $pelicula['nombre'] ?></h1>
    <form action="seleccion_asientos.php" method="get">
        <input type="hidden" name="pelicula_id" value="<?= $pelicula_id ?>">
        <select name="horario">
            <?php foreach ($peliculas[$pelicula_id]['horarios'] as $horario => $datosHorario): ?>
                <option value="<?= $horario ?>"><?= $horario ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Seleccionar Horario">
    </form>
</body>

</html>