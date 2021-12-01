<?php
    class Producto {
        private $atributos = ['id' => 0, 'nombre' => null, 'descripcion' => null, 'precio' => 0, 'imagen' => null];
        private static $numeroProducto = 1000;

        /**
         * Constructor de la clase Producto
         * @param string $nombre
         * @param string $descripcion
         * @param float $precio
         * @param string $imagen
         * @param int|null $id
         */
        public function __construct(string $nombre, string $descripcion, float $precio, string $imagen, int $id = null) {
            if ($id == null) {
                $this->atributos['id'] = self::$numeroProducto++;
            } else {
                $this->atributos['id'] = $id;
            }
            $this->atributos['nombre'] = $nombre;
            $this->atributos['descripcion'] = $descripcion;
            $this->atributos['precio'] = $precio;
            $this->atributos['imagen'] = $imagen;
        }

        /**
         * Funcion con los setters de la clase
         * @param $campo
         * @param $valor
         */
        public function __set($campo, $valor) {
            if ($campo = 'id' && $valor < 1000) {
                throw new Exception('El ID no puede ser menor a 1000');
            }
            $this->atributos[$campo] = $valor;
        }

        /**
         * Funcion con los getters de la clase
         * @param $campo
         * @return mixed
         */
        public function __get($campo) {
            return $this->atributos[$campo];
        }

        /**
         * Funcion toString de la clase
         * @return false|string
         */
        public function __toString() {
            ob_start();
            print_r($this->atributos);
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
    }
    $producto = new Producto("Pipas", "Pipas con sal", 1.25, "pipas.jpg");
    $producto->precio += 1;
    $producto->nuevo = 5;
?>