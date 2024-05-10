<?php
class Cuenta{
    private $objCliente;
    private $saldo;
    
    public function __construct($objCliente, $saldo)
    {
        $this->objCliente=$objCliente;
        $this->saldo=$saldo;
    }

    public function getObjCliente(){
        return $this->objCliente;
    }
    public function getSaldo(){
        return $this->saldo;
    }

    public function setObjCliente($nvoObjCliente){
        $this->objCliente=$nvoObjCliente;
    }
    public function setSaldo($nvoSaldo){
        $this->saldo=$nvoSaldo;
    }

    public function __toString()
    {
        return $this->getObjCliente(). " - Saldo: $". $this->getSaldo();
    }

    public function saldoCuenta(){
        $this->getSaldo();
    }

    public function realizarDeposito($monto){
        $nvoSaldo=$this->getSaldo() + $monto;
        $this->setSaldo($nvoSaldo);
    }

    public function realizarRetiro($monto){
        $nvoSaldo=$this->getSaldo() - $monto;
        $this->setSaldo($nvoSaldo);
    }

}
?>