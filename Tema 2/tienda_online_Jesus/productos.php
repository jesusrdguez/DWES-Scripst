<?php

function inicializar_productos()
{
    $_SESSION['productos'] = [
        'hombre' => [
            'camisas' => [
                [
                    'nombre' => 'Camisa Casual Hombre',
                    'precio' => 25.99,
                    'cantidad' => 50,
                ],
                [
                    'nombre' => 'Camisa Formal Hombre',
                    'precio' => 39.99,
                    'cantidad' => 30,
                ],
            ],
            'pantalones' => [
                [
                    'nombre' => 'Pantalón Chino Hombre',
                    'precio' => 29.99,
                    'cantidad' => 40,
                ],
                [
                    'nombre' => 'Jeans Hombre',
                    'precio' => 49.99,
                    'cantidad' => 60,
                ],
            ],
            'jerseys' => [
                [
                    'nombre' => 'Jersey de Punto Hombre',
                    'precio' => 35.99,
                    'cantidad' => 20,
                ],
            ],
            'calcetines' => [
                [
                    'nombre' => 'Pack 3 Calcetines Hombre',
                    'precio' => 9.99,
                    'cantidad' => 100,
                ],
            ],
        ],
        'mujer' => [
            'camisas' => [
                [
                    'nombre' => 'Blusa Casual Mujer',
                    'precio' => 22.99,
                    'cantidad' => 60,
                ],
                [
                    'nombre' => 'Blusa Formal Mujer',
                    'precio' => 35.99,
                    'cantidad' => 25,
                ],
            ],
            'pantalones' => [
                [
                    'nombre' => 'Leggings Mujer',
                    'precio' => 19.99,
                    'cantidad' => 50,
                ],
                [
                    'nombre' => 'Jeans Mujer',
                    'precio' => 44.99,
                    'cantidad' => 70,
                ],
            ],
            'jerseys' => [
                [
                    'nombre' => 'Jersey Oversize Mujer',
                    'precio' => 39.99,
                    'cantidad' => 30,
                ],
            ],
            'calcetines' => [
                [
                    'nombre' => 'Pack 3 Calcetines Mujer',
                    'precio' => 9.99,
                    'cantidad' => 120,
                ],
            ],
        ],
        'niño' => [
            'camisas' => [
                [
                    'nombre' => 'Camisa Infantil',
                    'precio' => 15.99,
                    'cantidad' => 40,
                ],
                [
                    'nombre' => 'Camisa Escolar Niño',
                    'precio' => 18.99,
                    'cantidad' => 35,
                ],
            ],
            'pantalones' => [
                [
                    'nombre' => 'Pantalón Escolar Niño',
                    'precio' => 20.99,
                    'cantidad' => 30,
                ],
                [
                    'nombre' => 'Jeans Niño',
                    'precio' => 25.99,
                    'cantidad' => 45,
                ],
            ],
            'jerseys' => [
                [
                    'nombre' => 'Jersey Infantil',
                    'precio' => 29.99,
                    'cantidad' => 25,
                ],
            ],
            'calcetines' => [
                [
                    'nombre' => 'Pack 5 Calcetines Niño',
                    'precio' => 7.99,
                    'cantidad' => 80,
                ],
            ],
        ],
    ];
}

function agregar_producto($producto_id)
{
    $_SESSION['carrito'][$producto_id]['cantidad'] = ($_SESSION['carrito'][$producto_id]['cantidad'] ?? 0) + 1;
}

function eliminar_producto($producto_id)
{
    if (isset($_SESSION['carrito'][$producto_id])) {
        unset($_SESSION['carrito'][$producto_id]);
    }
}

function calcular_total()
{
    $total = 0;
    foreach ($_SESSION['carrito'] as $producto) {
        $total += $producto['cantidad'] * $producto['precio'];
    }
    return $total;
}

?>