<?php
namespace Tema05\Ejercicio01_Clase\Modelo;
use Exception;
class Producto {
    private $atributos = [];

    /**
     * Constructor de la clase Producto
     * @param int $id del producto
     * @param string $nombre del producto
     * @param string $descripcion del producto
     * @param float $precio del producto
     * @param string $imagen del producto
     * @throws Exception
     */
    public function __construct(string $nombre, string $descripcion, float $precio, string $imagen, int $id = null) {
        if (!$this->validarCadenas($descripcion, $nombre, $imagen || $precio < 0)) {
            throw new Exception("Error al crear el producto");
        }
        $this->atributos['nombre'] = $nombre;
        $this->atributos['descripcion'] = $descripcion;
        $this->atributos['precio'] = $precio;
        $this->atributos['imagen'] = $imagen;
        $this->atributos['id'] = $id;
    }

    /**
     *
     * @param array $producto
     * @return Producto
     * @throws Exception
     */
    public static function getProducto(array $producto):Producto {
        return new Producto($producto['id'], $producto['descripcion'], $producto['nombre'], $producto['precio'], $producto['imagen']);
    }

    /**
     * Función con los setters de la clase
     * @param $atributo
     * @param $valor
     */
    public function __set(string $atributo, $valor) {
        $this->atributos[$atributo] = $valor;
    }

    /**
     * Función con los getters de la clase
     * @param $atributo
     * @return mixed
     */
    public function __get(string $atributo) {
        return $this->atributos[$atributo];
    }

    public function getAtributos() {
        return $this->atributos;
    }

    /**
     * Función que valida si una cadena está vacía
     * @param string $cadenas a validar
     * @return bool
     */
    public function validarCadenas(... $cadenas):bool {
        foreach ($cadenas as $cadena) {
            if ($cadena == null || $cadena == "") {
                return false;
            }
        }
        return true;
    }
}