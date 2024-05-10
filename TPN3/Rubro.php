<?php
class Rubro{
    //Atributos
    private $descripcion;
    private $porcentajeGanancia;

    //Método Constructor
    public function __construct($descripcion, $porcentajeGanancia){
        $this->descripcion=$descripcion;
        $this->porcentajeGanancia=$porcentajeGanancia;
    }

    ///Métodos de acceso
    //Getters
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getPorcentajeGanancia(){
        return $this->porcentajeGanancia;
    }

    //Setters
    public function setDescripcion($nvaDescripcion){
        $this->descripcion=$nvaDescripcion;
    }
    public function setPorcentajeGanancia($nvoPorcentajeGanancia){
        $this->porcentajeGanancia=$nvoPorcentajeGanancia;
    }

    //Método toString
    public function __toString(){
        return "Rubro: ". $this->getDescripcion(). " | Porcentaje de ganancia a productos del rubro: ". $this->getPorcentajeGanancia(). "%";
    }
}
?>