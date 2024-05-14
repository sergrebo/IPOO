<?php
//Ss
class Pasajero{
    private $nombre;
    private $apellido;
    private $nroDni;
    private $nroTelefono;
    private $nroAsiento;
    private $nroTicket;

    public function __construct($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->nroDni=$dni;
        $this->nroTelefono=$telefono;
        $this->nroAsiento=$nroAsiento;
        $this->nroTicket=$nroTicket;
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
    public function getNroTelefono(){
        return $this->nroTelefono;
    }
    public function getNroAsiento(){
        return $this->nroAsiento;
    }
    public function getNroTicket(){
        return $this->nroTicket;
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
    public function setNroAsiento($nuevoNroAsiento){
        $this->nroAsiento=$nuevoNroAsiento;
    }
    public function setNroTicket($nuevoNroTicket){
        $this->nroTicket=$nuevoNroTicket;
    }

    public function __toString(){
        return $this->getNombre(). " ". $this->getApellido(). " - DNI: ". $this->getNroDni(). " - Telefono: ". $this->getNroTelefono(). " - Asiento N°". $this->getNroAsiento(). " - Ticket N°: ". $this->getNroTicket(). "\n";
    }
}
?>