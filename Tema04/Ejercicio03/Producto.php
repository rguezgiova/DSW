<?php
    class Producto {
        private $id;
        private $nombre;
        private $descripcion;
        private $precio;
        private $imagen;

        /**
         * Constructor de la clase Producto
         * @param $id
         * @param $nombre
         * @param $descripcion
         * @param $precio
         * @param $imagen
         */
        public function __construct($id, $nombre, $descripcion, $precio, $imagen) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
            $this->imagen = $imagen;
        }

        /**
         * Getters de la clase Producto
         */
        public function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function getPrecio() {
            return $this->precio;
        }

        function getImagen() {
            return $this->imagen;
        }
    }
?>