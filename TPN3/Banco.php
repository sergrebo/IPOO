<?php
class Banco{
    private $coleccionCuentaCorriente;
    private $coleccionCajaAhorro;
    private $ultimoValorCuentaAsignado;
    private $coleccionCliente;

    public function __construct($coleccionCuentaCorriente, $coleccionCajaAhorro, $ultimoValorCuentaAsignado, $coleccionCliente)
    {
        $this->coleccionCuentaCorriente=$coleccionCuentaCorriente;
        $this->coleccionCajaAhorro=$coleccionCajaAhorro;
        $this->ultimoValorCuentaAsignado=$ultimoValorCuentaAsignado;
        $this->coleccionCliente=$coleccionCliente;
    }

    public function getColCC(){
        return $this->coleccionCuentaCorriente;
    }
    public function getColCA(){
        return $this->coleccionCajaAhorro;
    }
    public function getUltimoValorCuenta(){
        return $this->ultimoValorCuentaAsignado;
    }
    public function getColCliente(){
        return $this->coleccionCliente;
    }

    public function setColCC($nvaColCC){
        $this->coleccionCuentaCorriente=$nvaColCC;
    }
    public function setColCA($nvaColCA){
        $this->coleccionCajaAhorro=$nvaColCA;
    }
    public function setUltimoValorCuenta($nvoUltValorCuenta){
        $this->ultimoValorCuentaAsignado=$nvoUltValorCuenta;
    }
    public function setColCliente($nvaColCliente){
        $this->coleccionCliente=$nvaColCliente;
    }

    public function __toString()
    {
        return "Cuentas corrientes:". $this->leerColeccion($this->getColCC()). "\nCajas de ahorro:". $this->leerColeccion($this->getColCA()). "\nUltimo valor asignado a una cuenta: ". $this->getUltimoValorCuenta(). "\nClientes:". $this->leerColeccion($this->coleccionCliente);
    }

    public function leerColeccion($coleccion){
        $cadena="";
        foreach ($coleccion as $objeto) {
            $cadena=$cadena. "\n".$objeto;
        }
        return $cadena;
    }

    public function incorporarCliente($objCliente){
        $colClienteCopia=$this->getColCliente();
        array_push($colClienteCopia, $objCliente);
        $this->setColCliente($colClienteCopia);
    }

    public function incorporarCuentaCorriente($numeroCliente, $montoDescubierto){
        $objClienteEncontrado=null;
        $coleccionCliente=$this->getColCliente();
        $coleccionCuentaCorriente=$this->getColCC();
        $clienteEncontrado=false;
        $posicionCliente=0;
        
        while (!$clienteEncontrado && $posicionCliente<count($coleccionCliente)) {
            if ($coleccionCliente[$posicionCliente]->getNroCliente()==$numeroCliente) {
                $objClienteEncontrado=$coleccionCliente[$posicionCliente];
                $clienteEncontrado=true;
            } //Hace falta un else por si no encuentro el cliente con ese numero?
            $posicionCliente++;
        }

        if ($clienteEncontrado) {
            $nvoObjCuentaCorriente=new CuentaCorriente($objClienteEncontrado, 0, $montoDescubierto);
            array_push($coleccionCuentaCorriente, $nvoObjCuentaCorriente);
            $this->setColCC($coleccionCuentaCorriente);
        }
        
        return $clienteEncontrado;
    }

    public function incorporarCajaAhorro($numeroCliente){

    }
}
?>