<?php
//Ss
class PasajeroVip extends Pasajero{
    private $nroViajeroFrecuente;
    private $cantMillas;

    public function __construct($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrecuente, $cantMillas){
        parent::__construct($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket);
        $this->nroViajeroFrecuente=$nroViajeroFrecuente;
        $this->cantMillas=$cantMillas;
    }

    public function getNroViajeroFrecuente(){
        return $this->nroViajeroFrecuente;
    }
    public function getCantMillas(){
        return $this->cantMillas;
    }

    public function setNroViajeroFrecuente($nuevoNroViajeroFrecuente){
        $this->nroViajeroFrecuente=$nuevoNroViajeroFrecuente;
    }
    public function setCantMillas($nuevaCantMillas){
        $this->cantMillas=$nuevaCantMillas;
    }

    public function __toString(){
        $cadena=parent::__toString();
        $cadena.=" - Viajero frecuente N°: ". $this->getNroViajeroFrecuente(). " - Cantidad de millas acumuladas: ". $this->getCantMillas();
        return $cadena;
    }

    public function darPorcentajeIncremento(){
        if ($this->cantMillas<=300) {
            $incremento=35;
        } elseif ($this->cantMillas>300) {
            $incremento=30;
        }
        return $incremento;
    }
}
?>