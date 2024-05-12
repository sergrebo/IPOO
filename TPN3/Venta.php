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

    /** Si la venta consta de un arreglo de objetos, lo recorre y da cada uno de ellos. Caso contrario, da el unico objeto de la venta.
     * 
     */
    public function descifrarProductos(){
        $cadena="";                                         //Inicialización de la variable a retornar
        $productos=$this->getColeccionProductos();
        if (is_array($productos)) {
            foreach ($productos as $objProducto) {
                $cadena.=$objProducto;
            }
        } else {
            $cadena=$productos;
        }
        return $cadena;
    }

    /** Retorna el valor que debe ser abonado por el cliente
     * 
    */
    public function darImporteVenta(){
        $importeVenta=-1;
        $colProdCopia=$this->getColeccionProductos();
        foreach ($colProdCopia as $arregloProductoCantidad) {
            foreach ($arregloProductoCantidad as $itemVenta) {
                $objProducto=$itemVenta["objProd"];
                $cantProducto=$itemVenta["cantProd"];
                $importeVenta+=$cantProducto * $objProducto->darPrecioVenta();
            }
        }
        return $importeVenta;
    }
}
?>