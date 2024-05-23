<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;

    public function __construct($nombre, $domicilio, $colClientes, $colMotos, $colVentas){
        $this->denominacion=$nombre;
        $this->direccion=$domicilio;
        $this->colClientes=$colClientes;
        $this->colMotos=$colMotos;
        $this->colVentas=$colVentas;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getColClientes(){
        return $this->colClientes;
    }
    public function getColMotos(){
        return $this->colMotos;
    }
    public function getColVentas(){
        return $this->colVentas;
    }

    public function setDenominacion($nvaDenominacion){
        $this->denominacion=$nvaDenominacion;
    }
    public function setDireccion($nvaDireccion){
        $this->direccion=$nvaDireccion;
    }
    public function setColClientes($nvaColClientes){
        $this->colClientes=$nvaColClientes;
    }
    public function setColMotos($nvaColMotos){
        $this->colMotos=$nvaColMotos;
    }
    public function setColVentas($nvaColVentas){
        $this->colVentas=$nvaColVentas;
    }

    public function __toString(){
        return "Empresa: ". $this->getDenominacion(). " - ". $this->getDireccion();
    }

    public function retornarMoto($codigoMoto){
        $colMotosCopia=$this->getColMotos();
        $posicionMoto=0;
        $motoEncontrada=false;
        $objMotoBuscado=null;
        do {
            if ($colMotosCopia[$posicionMoto]->getCodigo()==$codigoMoto){
                $motoEncontrada=true;
                $objMotoBuscado=$colMotosCopia[$posicionMoto];
            }
            $posicionMoto++;
        } while ($posicionMoto<count($colMotosCopia) && !$motoEncontrada);
        return $objMotoBuscado;
    }

    public function registrarVenta($colCodigosMoto, $objCliente){
        $precioFinal=-1;
        if (!$objCliente->getEstadoBaja()) {
            $objVenta=new Venta((count($this->getColVentas())+1), date("d/m/Y"), $objCliente, [], 0);
            for ($i=0; $i<count($colCodigosMoto) ; $i++) {
                $objMoto=$this->retornarMoto($colCodigosMoto[$i]);
                if ($objMoto!=null) {
                    $objVenta->incorporarMoto($objMoto);
                }
            }
        $precioFinal=$objVenta->getPrecioFinal();
        }
        $colVentas=$this->getColVentas();
        array_push($colVentas, $objVenta);
        $this->setColVentas($colVentas);
        return $precioFinal;
    }

    public function informarSumaVentasNacionales(){
        
    }
}
?>