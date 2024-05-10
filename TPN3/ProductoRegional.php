<?php
class ProductoRegional extends Producto{
    //Atributos particulares
    private $porcentajeDescuento;

    //Método Constructor
    public function __construct($codigoBarra, $descripcion, $stock, $porcentajeIva, $precioCompra, $objRubro, $porcentajeDescuento){
        parent::__construct($codigoBarra, $descripcion, $stock, $porcentajeIva, $precioCompra, $objRubro);
        $this->porcentajeDescuento=$porcentajeDescuento;
    }

    ///Métodos de acceso
    //Getters
    public function getPorcentajeDescuento(){
        return $this->porcentajeDescuento;
    }
    
    //Setters
    public function setPorcentajeDescuento($nvoPorcenajeDescuento){
        $this->porcentajeDescuento=$nvoPorcenajeDescuento;
    }

    //Método toString
    public function __toString(){
        $cadena=parent::__toString();
        $cadena.=" | Descuento: ". $this->getPorcentajeDescuento(). "%";
    }

    public function darPrecioVenta(){
        $precioVenta=parent::darPrecioVenta();
        $precioVentaRegional=$precioVenta - (($precioVenta * $this->getPorcentajeDescuento())/100);
        return $precioVentaRegional;
    }
}
?>