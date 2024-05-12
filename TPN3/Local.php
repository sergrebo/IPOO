<?php
class Local{
    //Atributos
    private $coleccionProductos;
    /**
     * private $coleccionProductosRegionales;
     * private $coleccionProductosImportados;
     */
    private $coleccionVentasRealizadas;

    //Método Constructor
    public function __construct($coleccionProductos){
        $this->coleccionProductos=$coleccionProductos;
    }

    ///Métodos de acceso
    //Getters
    public function getColeccionProductos(){
        return $this->coleccionProductos;
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

    
    /** Incorpora el producto que ingresa como parametro al arreglo coleccionProductos que almacena todos los productos de la venta 
     * 
    */
    public function incorporarProductoTienda($objProducto){
        $colProdCopia=$this->getColeccionProductos();
        array_push($colProdCopia, $objProducto);            //¿No deberia ser un arreglo multidimensional? Asociativo (["objProd"]["cantProd"]) dentro de indexado
        $this->setColeccionProductos($colProdCopia);
    }

    public function retornarCostoProductoTienda(){}

    public function productoMasEconomico($rubro){}

    public function informarProductosMasVendidos($anio, $n){}

    public function promedioVentasImportados(){}

    public function informarConsumoCliente($tipoDoc, $numDoc){}

    //sS
}
?>