<?php
class Venta{
    //Atributos
    private $fecha;
    private $coleccionProductos;
    private $objCliente;

    //Método Constructor
    public function __construct($fecha, $coleccionProductos, $objCliente){
        $this->fecha=$fecha;
        $this->coleccionProductos=$coleccionProductos;
        $this->$objCliente=$objCliente;
    }

    ///Métodos de acceso
    //Getters
    public function getFecha(){
        return $this->fecha;
    }
    public function getColeccionProductos(){
        return $this->coleccionProductos;
    }
    public function getObjCliente(){
        return $this->objCliente;
    }

    //Setters
    public function setFecha($nvaFecha){
        $this->fecha=$nvaFecha;
    }
    public function setColeccionProductos($nvaColeccionProductos){
        $this->coleccionProductos=$nvaColeccionProductos;
    }
    public function setObjCliente($nvoObjCliente){
        $this->objCliente=$nvoObjCliente;
    }

    //Método toString
    public function __toString(){
        return "Fecha: ". $this->getFecha(). " | Producto/s: ". $this->descifrarProductos(). " | Cliente: ". $this->getObjCliente();
    }

    public function descifrarProductos(){
        $cadena="";                                         //Inicialización de la variable que contendra el arreglo en forma de cadena de caracteres, si lo es, o simplemente el objeto producto
        $productos=$this->getColeccionProductos();          //Copia del atributo
        if (is_array($productos)) {
            foreach ($productos as $objProducto) {
                $cadena.=$objProducto;
            }
        } else {
            $cadena=$productos;
        }
        return $cadena;
    }

    public function darImporteVenta(){}

    public function incorporarProductoTienda(){}

    public function retornarImporteProducto($codProducto){}

    public function retornarCostoProductoTienda(){}
}
?>