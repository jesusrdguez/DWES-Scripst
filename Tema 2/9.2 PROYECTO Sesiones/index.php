<?php
session_start();

include 'funciones.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido al Cine</title>
</head>

<body>
    <h1>Bienvenido al Cine</h1>
    <h3>Selecciona una película:</h3>
    <form action="seleccion_pelicula.php" method="get">
        <select name="pelicula_id">
            <?php foreach ($peliculas as $pelicula): ?>
                <option value="<?= $pelicula['id'] ?>"><?= $pelicula['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Seleccionar Película">
    </form>
</body>

</html>