<?php
class Persona{
    private $dni;
    private $nombre;
    private $apellido;

    public function __construct($dni, $nombre, $apellido)
    {
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }

    public function getDni(){
        return $this->dni;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    public function setDni($nvoDni){
        $this->dni=$nvoDni;
    }
    public function setNombre($nvoNombre){
        $this->nombre=$nvoNombre;
    }
    public function setApellido($nvoApellido){
        $this->apellido=$nvoApellido;
    }

    public function __toString()
    {
        return $this->getApellido(). " ". $this->getNombre(). " - DNI ". $this->getDni();
    }
}
?>