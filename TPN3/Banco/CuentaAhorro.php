<?php
class CuentaAhorro extends Cuenta{
    public function __construct($objCliente, $saldo)
    {
        parent::__construct($objCliente, $saldo);
    }

    public function __toString()
    {
        return parent::__toString();
    }

    public function realizarRetiro($monto)
    {
        $saldoActualizado=false;
        $saldoFinal=$this->getSaldo()-$monto;
        if ($saldoFinal>=0) {
            parent::realizarRetiro($monto);
            $saldoActualizado=true;
        }
        return $saldoActualizado;
    }

}
?>