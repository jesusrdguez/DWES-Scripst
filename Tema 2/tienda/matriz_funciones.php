<?php

function inicializar_productos()
{
    $_SESSION['productos'] = [
        'producto1' => [
            'nombre' => 'Camiseta',
            'precio' => 20,
            'stock' => 50,
        ],
        'producto2' => [
            'nombre' => 'Pantalón',
            'precio' => 30,
            'stock' => 40,
        ],
        'producto3' => [
            'nombre' => 'Zapatillas',
            'precio' => 50,
            'stock' => 30,
        ]
    ];
}

?>