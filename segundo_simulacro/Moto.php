<?php
class Moto {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcIncrementoAnual;
    private $activa;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrementoAnual, $activa){
        $this->codigo=$codigo;
        $this->costo=$costo;
        $this->anioFabricacion=$anioFabricacion;
        $this->descripcion=$descripcion;
        $this->porcIncrementoAnual=$porcIncrementoAnual;
        $this->activa=$activa;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getPocentajeIncrementoAnual(){
        return $this->porcIncrementoAnual;
    }
    public function getActiva(){
        return $this->activa;
    }

    public function setCodigo($nvoCod){
        $this->codigo=$nvoCod;
    }
    public function setCosto($nvoCosto){
        $this->costo=$nvoCosto;
    }
    public function setAnioFabricacion($nvoAnio){
        $this->anioFabricacion=$nvoAnio;
    }
    public function setDescripcion($nvaDesc){
        $this->descripcion=$nvaDesc;
    }
    public function setPorcentajeIncrementoAnual($nvoPorcentaje){
        $this->porcIncrementoAnual=$nvoPorcentaje;
    }
    public function setActiva($nvaActiva){
        $this->activa=$nvaActiva;
    }

    public function __toString(){
        return "Código: ". $this->getCodigo(). " - Costo: ". $this->getCosto(). " - Año: ". $this->getAnioFabricacion(). "\nDescripción: ". $this->getDescripcion(). "\nPorcentaje de incremento anual: ". $this->getPocentajeIncrementoAnual(). "%\n". $this->imprimirActiva();
    }

    public function imprimirActiva(){
        $respuesta="";
        if ($this->getActiva()) {
            $respuesta="Apta para la venta";
        } else {
            $respuesta="No comercializable";
        }
        return $respuesta;
    }

    public function darPrecioVenta(){
        $_venta=-1;         //si el precio de venta retornado es -1 es evidencia de que la moto no esta disponible para la venta
        $disponible=$this->getActiva();
        $costo=$this->getCosto();
        $anioFabricacion=$this->getAnioFabricacion();
        $porcentajeIncrementoAnual=$this->getPocentajeIncrementoAnual();

        if ($disponible) {
            $_venta=$costo + $costo * ((intval(date("Y")) - $anioFabricacion) * $porcentajeIncrementoAnual)/100;
        }
        return $_venta;
    }
}
?>