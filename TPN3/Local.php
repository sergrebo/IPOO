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
}
?>