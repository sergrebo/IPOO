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

    public function encontrarCliente($numeroCliente){
        $objClienteEncontrado=null;
        $coleccionCliente=$this->getColCliente();
        $clienteEncontrado=false;
        $posicionCliente=0;
        
        while (!$clienteEncontrado && $posicionCliente<count($coleccionCliente)) {
            if ($coleccionCliente[$posicionCliente]->getNroCliente()==$numeroCliente) {
                $objClienteEncontrado=$coleccionCliente[$posicionCliente];
                $clienteEncontrado=true;
            } //Hace falta un else por si no encuentro el cliente con ese numero?
            $posicionCliente++;
        }
        return $objClienteEncontrado;
    }

    public function incorporarCuentaCorriente($numeroCliente, $montoDescubierto){
        $coleccionCuentaCorriente=$this->getColCC();    //copia de la colección original para luego setearla con la nueva incorpración
        $numCuentaNueva=$this->getUltimoValorCuenta()+1;    //defino el numero de cuenta que tendrá si la misma es creada. Quiero que sea igual al número de índice del arreglo al que corresponde.

        $elObjCliente=$this->encontrarCliente($numeroCliente);
        if (!is_null($elObjCliente)) {
            $nvoObjCuentaCorriente=new CuentaCorriente($elObjCliente, 0, $montoDescubierto);
            $coleccionCuentaCorriente[$numCuentaNueva]=$nvoObjCuentaCorriente;  //el índice del arreglo es el numero de cuenta por lo que los números índice de los arreglos para CC y CA no son necesariamente consecutivos.
            //array_push($coleccionCuentaCorriente, $nvoObjCuentaCorriente);
            $this->setColCC($coleccionCuentaCorriente);
            $this->setUltimoValorCuenta($numCuentaNueva);
        }
        return $elObjCliente;
    }

    public function incorporarCajaAhorro($numeroCliente){
        $coleccionCajaAhorro=$this->getColCA();    //copia de la colección original para luego setearla con la nueva incorpración
        $numCuentaNueva=$this->getUltimoValorCuenta()+1;    //defino el número de cuenta que tendrá si la misma es creada. Quiero que sea igual al número de índice del arreglo al que corresponde.

        $elObjCliente=$this->encontrarCliente($numeroCliente);
        if (!is_null($elObjCliente)) {
            $nvoObjCajaAhorro=new CuentaAhorro($elObjCliente, 0);
            $coleccionCajaAhorro[$numCuentaNueva]=$nvoObjCajaAhorro;    //el índice del arreglo es el numero de cuenta por lo que los números índice de los arreglos para CC y CA no son necesariamente consecutivos.
            //array_push($colecccionCajaAhorro, $nvoObjCajaAhorro);
            $this->setColCA($coleccionCajaAhorro);
            $this->setUltimoValorCuenta($numCuentaNueva);
        }
        return $elObjCliente;
    }

    public function realizarDeposito($numCuenta, $monto){
        $cuentaEncontrada=null;
        $colCCCopia=$this->getColCC();
        $colCACopia=$this->getColCA();
        $coleccionCuentas=array_merge($colCCCopia, $colCACopia);
        
        print_r($coleccionCuentas);

        $cuentaEncontrada=$coleccionCuentas[$numCuenta];
        if (!is_null($cuentaEncontrada)) {
            $cuentaEncontrada->realizarDeposito($monto);
        }
        return $cuentaEncontrada;
    }

    public function realizarRetiro($numCuenta, $monto){
        $cuentaEncontrada=null;
        $colCCCopia=$this->getColCC();
        $colCACopia=$this->getColCA();
        $coleccionCuentas=array_merge($colCCCopia, $colCACopia);

        $cuentaEncontrada=$coleccionCuentas[$numCuenta];
        if (!is_null($cuentaEncontrada)) {
            $cuentaEncontrada->realizarRetiro($monto);
        }
        return $cuentaEncontrada;
    }
}
?>