<?php
class PasajeroConNecesidades extends Pasajero{
    private $necesidades;

    public function __construct($nombre, $apellido, $dni, $nroTelefono, $nroAsiento, $nroTicket, $necesidades){
        parent::__construct($nombre, $apellido, $dni, $nroTelefono, $nroAsiento, $nroTicket);
        $this->necesidades=$necesidades;
    }

    public function getNecesidades(){
        return $this->necesidades;
    }

    public function setNecesidades($nuevaNecesidades){
        $this->necesidades=$nuevaNecesidades;
    }

    public function __toString(){
        $cadena=parent::__toString();
        $cadena.=" - Necesidades: ". $this->getNecesidades();
        return $cadena;
    }

    public function darPorcentajeIncremento(){
        if ($this->getNecesidades()==1) {
            $incremento=15;
        } elseif ($this->getNecesidades()!=1) {
            $incremento=30;
        }
        return $incremento;
    }
}
?>