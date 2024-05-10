<?php
class Producto{
    //Atributos
    private $codigoBarra;
    private $descripcion;
    private $stock;
    private $porcentajeIva;
    private $precioCompra;
    private $objRubro;

    //Método Constructor
    public function __construct($codigoBarra, $descripcion, $stock, $porcentajeIva, $precioCompra, $objRubro){
        $this->codigoBarra=$codigoBarra;
        $this->descripcion=$descripcion;
        $this->stock=$stock;
        $this->porcentajeIva=$porcentajeIva;
        $this->precioCompra=$precioCompra;
        $this->objRubro=$objRubro;
    }

    ///Métodos de acceso a los atributos
    //Getters
    public function getCodigoBarra(){
        return $this->codigoBarra;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getStock(){
        return $this->stock;
    }
    public function getPorcentajeIva(){
        return $this->porcentajeIva;
    }
    public function getPrecioCompra(){
        return $this->precioCompra;
    }
    public function getObjRubro(){
        return $this->objRubro;
    }

    //Setters
    public function setCodigoBarra($nvoCodigoBarra){
        $this->codigoBarra=$nvoCodigoBarra;
    }
    public function setDescripcion($nvaDescripcion){
        $this->descripcion=$nvaDescripcion;
    }
    public function setStock($nvoStock){
        $this->stock=$nvoStock;
    }
    public function setPorcentajeIva($nvoPorcentajeIva){
        $this->porcentajeIva=$nvoPorcentajeIva;
    }
    public function setPrecioCompra($nvoPrecioCompra){
        $this->precioCompra=$nvoPrecioCompra;
    }
    public function setObjRubro($nvoObjRubro){
        $this->objRubro=$nvoObjRubro;
    }

    //Método toString
    public function __toString(){
        return "Código: ". $this->getCodigoBarra(). " | Descripción: ". $this->getDescripcion(). " | Stock: ". $this->getStock(). " | Porcentaje IVA: ". $this->getPorcentajeIva(). " | Precio compra: $". $this->getPrecioCompra(). " | Rubro: ". $this->getObjRubro();
    }

    public function darPrecioVenta(){
        $precioCompra=$this->getPrecioCompra();
        $gananciaRubro=($precioCompra * $this->objRubro->porcentajeGanancia)/100;
        $iva=(($precioCompra+$gananciaRubro) * $this->getPorcentajeIva())/100;
        $precioVenta=$precioCompra+$gananciaRubro+$iva;
        return $precioVenta;
    }

}
?>