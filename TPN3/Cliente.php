<?php
class Cliente extends Persona{
    private $nroCliente;

    public function __construct($dni, $nombre, $apellido, $nroCliente)
    {
        parent::__construct($dni, $nombre, $apellido);
        $this->nroCliente=$nroCliente;
    }

    public function getNroCliente(){
        return $this->nroCliente;
    }

    public function setNroCliente($nvoNroCliente){
        $this->nroCliente=$nvoNroCliente;
    }

    public function __toString()
    {
        $cadena=parent::__toString();
        $cadena.= " - Numero de cliente: ". $this->getNroCliente();
        return $cadena;
    }
}
?>