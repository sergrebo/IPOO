<?php
class ProductoImportado extends Producto{
    //Atributos particulares
    private $incrementoPrecio;
    private $impuestoImportado;

    //Método Constructor
    public function __construct($codigoBarra, $descripcion, $stock, $porcentajeIva, $precioCompra, $objRubro, $incrementoPrecio, $impuestoImportado){
        parent ::__construct($codigoBarra, $descripcion, $stock, $porcentajeIva, $precioCompra, $objRubro);
        $this->incrementoPrecio=50;
        $this->impuestoImportado=10;
    }

    ///Métodos de acceso
    //Getters
    public function getIncrementoPrecio(){
        return $this->incrementoPrecio;
    }
    public function getImpuestoImportado(){
        return $this->impuestoImportado;
    }

    //Setters
    public function setIncrementoPrecio($nvoIncrementoPrecio){
        $this->incrementoPrecio=$nvoIncrementoPrecio;
    }
    public function setImpuestoImportado($nvoImpuestoImportado){
        $this->impuestoImportado=$nvoImpuestoImportado;
    }

    //Método toString
    public function __toString(){
        $cadena=parent::__toString();
        $cadena.=" | Incremento de precio de venta: ". $this->getIncrementoPrecio(). "% | Impuesto: ". $this->getImpuestoImportado(). "%";
        return $cadena;
    }

    public function darPrecioVenta(){
        $precioVenta=parent::darPrecioVenta();
        $precioVentaImportado=$precioVenta + (($precioVenta * $this->getIncrementoPrecio())/100);
        $precioVentaImportado=$precioVentaImportado + (($precioVentaImportado * $this->getImpuestoImportado())/100);
        return $precioVentaImportado;
    }
}
?>