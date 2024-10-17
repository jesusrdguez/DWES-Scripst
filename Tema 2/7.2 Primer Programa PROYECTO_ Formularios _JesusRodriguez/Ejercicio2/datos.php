<?php
if ($_POST['size'] < 1 || $_POST['size'] > 10) {
    echo "El tamaño debe estar entre 1 y 10. <a href='ejercicio_dos.php'>Volver al inicio</a>";
    exit;
}
$size = $_POST['size'];
?>
<form action="matriz.php" method="POST">
    <h3>Introduce los valores de la matriz:</h3>
    <table>
        <?php
        for ($i = 0; $i < $size; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $size; $j++) {
                echo "<td><input type='text' name='matriz[$i][$j]' required></td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <h3>Selecciona las coordenadas iniciales:</h3>
    <label for="fila">Fila:</label>
    <select name="fila">
        <?php for ($i = 0; $i < $size; $i++) {
            echo "<option value='$i'>$i</option>";
        } ?>
    </select>

    <label for="columna">Columna:</label>
    <select name="columna">
        <?php for ($j = 0; $j < $size; $j++) {
            echo "<option value='$j'>$j</option>";
        } ?>
    </select>

    <h3>Selecciona la dirección:</h3>
    <select name="direccion">
        <option value="arriba">Arriba</option>
        <option value="abajo">Abajo</option>
        <option value="izquierda">Izquierda</option>
        <option value="derecha">Derecha</option>
        <option value="arriba_izquierda">Arriba e Izquierda</option>
        <option value="arriba_derecha">Arriba y Derecha</option>
        <option value="abajo_izquierda">Abajo e Izquierda</option>
        <option value="abajo_derecha">Abajo y Derecha</option>
    </select>

    <input type="submit" value="Enviar">

    <br><br>
    <a href='ejercicio_dos.html'>Volver al inicio</a>
</form>
