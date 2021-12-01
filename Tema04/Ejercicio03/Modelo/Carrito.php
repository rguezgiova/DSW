<?php
    require_once("Producto.php");
    class Carrito {
        private $listaProductos  = [];

        /**
         * Constructor de la clase Carrito
         */
        public function __construct($listaProductos = []) {
            $this->listaProductos = $listaProductos;
        }

        /**
         * Funcion que comprueba si un producto esta en el carro
         * @param int $id
         * @return bool
         */
        public function estaEnCarro(int $id) {
            return isset($listaProductos[$id]);
        }

        /**
         * Funcion para insertar un producto a la lista
         * @param Producto $producto
         */
        public function insertarProducto(Producto $producto) {
            if ($this->estaEnCarro($producto->id)) {
                $producto->cantidad++;
            } else {
                $producto->cantidad = 1;
                $listaProductos[$producto->id] = $producto;
            }
        }

        /**
         * Funcion para borrar un producto de la lista
         * @param int $id
         */
        public function borrarProducto(int $id) {
            if ($this->estaEnCarro($id)) {
                unset($this->listaProductos[$id]);
            }
        }

        /**
         * Funcion que recoge los productos de la lista
         * @return array|mixed
         */
        public function getListaProductos() {
            return $this->listaProductos;
        }

        /**
         * Funcion que calcula el precio de la lista
         * @return float|int
         */
        public function calcularPrecioTotal() {
            $suma = 0;
            foreach ($this->listaProductos as $producto) {
                $suma += $producto->cantidad * $producto->precio;
            }
            return $suma;
        }
    }
?>