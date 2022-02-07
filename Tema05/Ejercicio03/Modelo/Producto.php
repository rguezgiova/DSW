<?php
namespace Tema05\Ejercicio03\Modelo;
class Producto {
    private $atributos = [];

    /**
     * Constructor de la clase Producto
     * @param int $codigo del producto
     * @param string $descripcion del producto
     * @param float $pcompra del producto
     * @param float $pcventa del producto
     * @param int $stock del producto
     */
    public function __construct(string $descripcion, float $pcompra, float $pventa, int $stock, string $codigo = null) {
        $this->atributos['descripcion'] = $descripcion;
        $this->atributos['pcompra'] = $pcompra;
        $this->atributos['pventa'] = $pventa;
        $this->atributos['stock'] = $stock;
        $this->atributos['codigo'] = $codigo;
    }

    /**
     *
     * @param array $producto
     * @return Producto
     * @throws PDOException
     */
    public static function getProducto(array $producto):Producto {
        [$codigo, $descripcion, $pcompra, $pventa, $stock] = [$producto['codigo'], $producto['descripcion'], $producto['pcompra'], $producto['pventa'], $producto['stock']];
        $newProducto = new Producto($descripcion, $pcompra, $pventa, $stock, $codigo);
        return $newProducto;
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

    public function margen() {
        return $this->pventa-$this->pcompra;
    }
}