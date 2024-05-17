<?php
//Ss
class ResponsableV{
    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($nroEmp, $nroLic, $nom, $ape){
        $this->nroEmpleado=$nroEmp;
        $this->nroLicencia=$nroLic;
        $this->nombre=$nom;
        $this->apellido=$ape;
    }

    public function getNroEmpleado(){
        return $this->nroEmpleado;
    }
    public function getNroLicencia(){
        return $this->nroLicencia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    public function setNroEmpleado($nuevoNroEmpleado){
        $this->nroEmpleado=$nuevoNroEmpleado;
    }
    public function setNroLicencia($nuevoNroLicencia){
        $this->nroLicencia=$nuevoNroLicencia;
    }
    public function setNombre($nuevoNombre){
        $this->nombre=$nuevoNombre;
    }
    public function setApellido($nuevoApellido){
        $this->apellido=$nuevoApellido;
    }

    public function __toString(){
        return $this->getNombre(). " ". $this->getApellido(). " - Empleado nro: ". $this->getNroEmpleado(). " Nro de licencia: ". $this->getNroLicencia();
    }
}
?>