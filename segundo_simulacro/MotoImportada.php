<?php
class MotoImportada extends Moto{
    private $paisOrigen;
    private $impuestosImportacion;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrementoAnual, $activa, $paisOrigen, $impuestosImportacion){
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrementoAnual, $activa);
        $this->paisOrigen=$paisOrigen;
        $this->impuestosImportacion=$impuestosImportacion;
    }

    public function getPaisOrigen(){
        return $this->paisOrigen;
    }
    public function setPaisOrigen($paisOrigen){
        $this->paisOrigen = $paisOrigen;
    }

    public function getImpuestosImportacion(){
        return $this->impuestosImportacion;
    }
    public function setImpuestosImportacion($impuestosImportacion){
        $this->impuestosImportacion = $impuestosImportacion;
    }

    public function __toString(){
        $cadena=parent::__toString();
        $cadena.="\nPaís de origen: ". $this->getPaisOrigen(). "\nImpuestos a la importación: $". $this->getImpuestosImportacion(). "\n";
        return $cadena;
    }

    public function darPrecioVenta(){
        $precioBase=parent::darPrecioVenta();
        $impuestosImportacion=$this->getImpuestosImportacion();
        $precioVentaImportado=$precioBase+$impuestosImportacion;
        return $precioVentaImportado;
    }
}
?>