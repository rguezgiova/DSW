<?php
    session_start();
    Class Carrito {
        protected $listaProductos;

        /**
         * Constructor de la clase Carrito
         */
        public function __construct() {
            $this->listaProductos = !empty($_SESSION['listaProductos']) ? $_SESSION['listaProductos']:null;
            if ($this->listaProductos == null) {
                $this->listaProductos = array('listaProductos' => 0, 'itemsTotales' => 0);
            }
        }

        public function insertar() {

        }

        public function borrar(){
            $this->listaProductos = array('listaProductos' => 0, 'itemsTotales' => 0);
            unset($_SESSION['listaProductos']);
        }

        public function calcularTotal() {

        }
    }
?>