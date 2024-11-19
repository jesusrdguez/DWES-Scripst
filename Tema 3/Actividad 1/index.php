<?php

require_once 'class.php';

$usuario = new Usuario("Jesús Rodríguez", "jesusrodrimerc99@gmail.com", "12345");

echo "Nombre del usuario: " . $usuario->getNombre() . "\n";

?>