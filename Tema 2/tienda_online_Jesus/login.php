<?php
session_start();
session_regenerate_id();
header('Cache-Control: no-store, no-cache, must-revalidate');

require_once('productos.php');

$usuarios = array(
    'admin' => 'admin',
    'usuario' => 'usuario'
);

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $contrasena) {
        $_SESSION['usuario'] = $usuario;
        inicializar_productos();
        header('Location: main.php');
        exit;
    } else {
        echo "<br><div style='text-align: center;font-weight: bold; font-size: 16px;'> Usuario o contraseña incorrectos. </div>";
        echo "<p><href : 'index.php'></p>";
    }
}
