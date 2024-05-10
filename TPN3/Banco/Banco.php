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
        return "Cuentas corrientes:". $this->leerArregloMulti($this->getColCC()). "\nCajas de ahorro:". $this->leerArregloMulti($this->getColCA()). "\nUltimo valor asignado a una cuenta: ". $this->getUltimoValorCuenta(). "\nClientes:". $this->leerArreglo($this->coleccionCliente);
    }

    public function leerArreglo($coleccion){
        $cadena="";
        foreach ($coleccion as $objeto) {
            $cadena=$cadena. "\n".$objeto;
        }
        return $cadena;
    }

    public function leerArregloMulti($coleccion){
        $cadena="";
        foreach ($coleccion as $asociativo) {
            $cadena=$cadena. "\nCuenta N°: ".$asociativo["numeroCuenta"]. " - ". $asociativo["objCuenta"];
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
        $numCuentaNueva=$this->getUltimoValorCuenta()+1;    //defino el numero de cuenta que tendrá si la misma es creada.

        $elObjCliente=$this->encontrarCliente($numeroCliente);
        if (!is_null($elObjCliente)) {
            $nvoObjCuentaCorriente=new CuentaCorriente($elObjCliente, 0, $montoDescubierto);
            $coleccionCuentaCorriente[]=["numeroCuenta"=>$numCuentaNueva, "objCuenta"=>$nvoObjCuentaCorriente]; //la colección de cuentas es un arreglo multidimensional, un asociativo dentro de un indexado
            $this->setColCC($coleccionCuentaCorriente);
            $this->setUltimoValorCuenta($numCuentaNueva);
        }
        return $elObjCliente;
    }

    public function incorporarCajaAhorro($numeroCliente){
        $coleccionCajaAhorro=$this->getColCA();    //copia de la colección original para luego setearla con la nueva incorpración
        $numCuentaNueva=$this->getUltimoValorCuenta()+1;    //defino el número de cuenta que tendrá si la misma es creada.

        $elObjCliente=$this->encontrarCliente($numeroCliente);
        if (!is_null($elObjCliente)) {
            $nvoObjCajaAhorro=new CuentaAhorro($elObjCliente, 0);
            $coleccionCajaAhorro[]=["numeroCuenta"=>$numCuentaNueva, "objCuenta"=>$nvoObjCajaAhorro];   //la colección de cuentas es un arreglo multidimensional, un asociativo dentro de un indexado
            $this->setColCA($coleccionCajaAhorro);
            $this->setUltimoValorCuenta($numCuentaNueva);
        }
        return $elObjCliente;
    }

    public function buscarCuenta($numCuenta){
        $colCCCopia=$this->getColCC();
        $colCACopia=$this->getColCA();
        $coleccionCuentas=array_merge($colCCCopia, $colCACopia);    //sumo los arreglos asociativos en un solo arreglo cuentas general
        $cuentaEncontrada=false;    //Bandera
        $posicionCuenta=0;          //Contador
        $objCuentaEncontrada=null;  //Variable contenedora del objeto si es encontrado, caso contrario me ayudara a responder al usuario que la cuenta no existe

        //Busqueda de la cuenta dentro del arreglo de cuentas
        while (!$cuentaEncontrada && $posicionCuenta<count($coleccionCuentas)) {
            if ($coleccionCuentas[$posicionCuenta]["numeroCuenta"]==$numCuenta) {
                $cuentaEncontrada=true;
                $objCuentaEncontrada=$coleccionCuentas[$posicionCuenta]["objCuenta"];
            }
            $posicionCuenta++;
        }
        return $objCuentaEncontrada;
    }

    public function realizarDeposito($numCuenta, $monto){
        //Busqueda externa de la cuenta
        $elObjCuenta=$this->buscarCuenta($numCuenta);

        //Si se encontró la cuenta buscada se realiza la operacion de deposito
        if (!is_null($elObjCuenta)) {
            $elObjCuenta->realizarDeposito($monto);
        }
        return $elObjCuenta;
    }

    public function realizarRetiro($numCuenta, $monto){
        //Busqueda externa de la cuenta
        $elObjCuenta=$this->buscarCuenta($numCuenta);

        //Si se encontró la cuenta buscada se realiza la operacion de deposito
        if (!is_null($elObjCuenta)) {
            $elObjCuenta->realizarRetiro($monto);
        }
        return $elObjCuenta;
    }
}
?>