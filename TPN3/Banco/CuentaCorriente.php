<?php
class CuentaCorriente extends Cuenta{
    private $descubierto;

    public function __construct($objCliente, $saldo, $descubierto)
    {
        parent::__construct($objCliente, $saldo);
        $this->descubierto=$descubierto;
    }

    public function getDescubierto(){
        return $this->descubierto;
    }

    public function setDescubierto($nvoDescubierto){
        $this->descubierto=$nvoDescubierto;
    }

    public function __toString()
    {
        $cadena=parent::__toString();
        $cadena.=" - Descubierto: ". $this->getDescubierto();
        return $cadena;
    }

    public function realizarRetiro($monto)
    {
        $retiroRealizado=false;
        $montoLimite=$this->getSaldo() + $this->getDescubierto();
        if ($montoLimite >= $monto) {
            parent::realizarRetiro($monto);
            $retiroRealizado=true;
        }
        return $retiroRealizado;
    }
}
?>