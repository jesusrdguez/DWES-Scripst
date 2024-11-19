<?php

// Requisitos:
// Atributos:
// id: Un identificador único para el producto (entero).
// nombre: El nombre del producto (cadena).
// precio: El precio del producto (flotante).
// stock: La cantidad de producto disponible en el inventario (entero).
// Constructor:
// Recibe como parámetros el id, nombre, precio y opcionalmente el stock (con valor por defecto 0).
// Asigna los valores a los atributos correspondientes.
// Método disminuirStock:
// Recibe como parámetro la cantidad de producto a restar del stock.
// Si hay suficiente stock, resta la cantidad y devuelve true.
// Si no hay suficiente stock, devuelve false.

class Producto
{
    private int $id;
    private string $name;
    private float $price;
    private int $stock;

    public function __construct(int $id, string $name, int $price, float $stock = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function disminuirStock(int $cantidad_restar) {
        if ($cantidad_restar <= $this->stock) {
            $this->stock -= $cantidad_restar;
            return true;
        } else
            return false;
    }

    public function getStock(): int
    {
        return $this->stock;
    }
}

?>