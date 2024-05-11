<?php
class Local{
    //Atributos
    private $coleccionProductos;

    //Método Constructor
    public function __construct($coleccionProductos){
        $this->coleccionProductos=$coleccionProductos;
    }

    ///Métodos de acceso
    //Getters
    public function getColeccionProductos(){
        return $this->getColeccionProductos();
    }

    //Setters
    public function setColeccionProductos($nvaColeccionProductos){
        $this->coleccionProductos=$nvaColeccionProductos;
    }

    //Método toString
    public function __toString(){
        return $this->leerColeccion($this->getColeccionProductos());
    }

    public function leerColeccion($coleccion){
        $cadena="";
        foreach ($coleccion as $objeto) {
            $cadena.=$objeto;
        }
        return $cadena;
    }
    
    public function incorporarProductoLocal($objProducto){
        $productoIncorporado=false;
        $colProdCopia=$this->getColeccionProductos();
        $productoRegitrado=$this->buscarProducto($objProducto->getCodigoBarra())["seEncontro"];

        if (!$productoRegitrado) {
            array_push($colProdCopia, $objProducto);
            $this->setColeccionProductos($colProdCopia);
            $productoIncorporado=true;
        }
        return $productoIncorporado;
    }

    public function buscarProducto($codigoBarra){
        $colProdCopia=$this->getColeccionProductos();
        $posicionProducto=-1;
        $arregloProductoEncontrado=["seEncontro"=>false, "objProducto"=>null];
        
        while (!$arregloProductoEncontrado["seEncontro"] && $posicionProducto<count($colProdCopia)) {
            if ($codigoBarra == $colProdCopia[$posicionProducto]->getCodigoBarra()) {
                $arregloProductoEncontrado["seEncontro"]=true;
                $arregloProductoEncontrado["objProducto"]=$colProdCopia[$posicionProducto];
            }
            $posicionProducto++;
        }
        return $arregloProductoEncontrado;
    }

    public function retornarImporteProducto($codProducto){
        $precioVenta=0;
        $objProducto=$this->buscarProducto($codProducto)["objProducto"];
        $precioVenta=$objProducto->darPrecioVenta();
        return $precioVenta;
    }

    public function retornarCostoProductoLocal(){
        $colProdCopia=$this->getColeccionProductos();
        $costo=-1;
        foreach ($colProdCopia as $objProducto) {
            $stockProducto=$objProducto->getStock();
            $precioCompraProducto=$objProducto->getPrecioCompra();
            $costo+=$stockProducto*$precioCompraProducto;
        }
        return $costo;
    }

    

    //sS
}
?>