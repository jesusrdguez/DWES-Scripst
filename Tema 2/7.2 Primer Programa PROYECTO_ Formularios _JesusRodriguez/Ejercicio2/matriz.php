<?php
$matriz = $_POST['matriz'];
$fila = $_POST['fila'];
$columna = $_POST['columna'];
$direccion = $_POST['direccion'];

function verTrayectoria($matriz, $fila, $columna, $direccion) {
    $trayectoria = [];
    $size = count($matriz);

    while ($fila >= 0 && $fila < $size && $columna >= 0 && $columna < $size) {
        $trayectoria[] = $matriz[$fila][$columna];

        switch ($direccion) {
            case 'arriba':
                $fila--;
                break;
            case 'abajo':
                $fila++;
                break;
            case 'izquierda':
                $columna--;
                break;
            case 'derecha':
                $columna++;
                break;
            case 'arriba_izquierda':
                $fila--;
                $columna--;
                break;
            case 'arriba_derecha':
                $fila--;
                $columna++;
                break;
            case 'abajo_izquierda':
                $fila++;
                $columna--;
                break;
            case 'abajo_derecha':
                $fila++;
                $columna++;
                break;
        }
    }

    return $trayectoria;
}

$trayectoria = verTrayectoria($matriz, $fila, $columna, $direccion);

echo "Los elementos de la trayectoria son: <br>";
echo implode(", ", $trayectoria);
echo "<br><br>";
echo "<a href='ejercicio_dos.html'>Volver al inicio</a>";

?>
