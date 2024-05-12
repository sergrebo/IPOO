<?php
//Ss
class Pasajero{
    private $nombre;
    private $apellido;
    private $nroDni;
    private $nroTelefono;

    public function __construct($nombre, $apellido, $dni, $telefono){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->nroDni=$dni;
        $this->nroTelefono=$telefono;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNroDni(){
        return $this->nroDni;
    }
    public function getNroTel(){
        return $this->nroTelefono;
    }

    public function setNombre($nuevoNombre){
        $this->nombre=$nuevoNombre;
    }
    public function setApellido($nuevoApellido){
        $this->apellido=$nuevoApellido;
    }
    public function setNroDni($nuevoDni){
        $this->nroDni=$nuevoDni;
    }
    public function setNroTelefono($nuevoTel){
        $this->nroTelefono=$nuevoTel;
    }

    public function __toString(){
        return $this->getNombre(). " ". $this->getApellido(). " - DNI: ". $this->getNroDni(). " - Telefono: ". $this->getNroTel() ."\n";
    }
}
?>