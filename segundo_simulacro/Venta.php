<?php
class Venta{
    private $numero;
    private $fecha;
    private $objCliente;
    private $colMotos;
    private $precioFinal;

    public function __construct($num, $fecha, $objCliente, $colMotos, $precioFinal){
        $this->numero=$num;
        $this->fecha=$fecha;
        $this->objCliente=$objCliente;
        $this->colMotos=$colMotos;
        $this->precioFinal=$precioFinal;
    }

    public function getNumero(){
        return $this->numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getObjCliente(){
        return $this->objCliente;
    }
    public function getColMotos(){
        return $this->colMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    public function setNumero($nvoNum){
        $this->numero=$nvoNum;
    }
    public function setFecha($nvaFecha){
        $this->fecha=$nvaFecha;
    }
    public function setObjCliente($nvoObjCliente){
        $this->objCliente=$nvoObjCliente;
    }
    public function setColMotos($nvaColMotos){
        $this->colMotos=$nvaColMotos;
    }
    public function setPrecioFinal($nvoPrecioFinal){
        $this->precioFinal=$nvoPrecioFinal;
    }

    public function __toString(){
        return "Venta n°: ". $this->getNumero(). " - Fecha: ". $this->getFecha(). " - Cliente: ". $this->getObjCliente(). " - Moto/s: ". $this->encadenarMotos(). "Precio final: $ ". $this->getPrecioFinal(). "\n";
    }

    public function encadenarMotos(){
        $colMotosCopia=$this->getColMotos();
        $cadena="";
        if (is_array($colMotosCopia)) {
            $cadena="\n";
            foreach ($colMotosCopia as $objMoto) {
                $cadena.=$objMoto;
            }
        } else {
            $cadena=$colMotosCopia;
        }
        return $cadena;
    }

    public function incorporarMoto($objMoto){
        if ($objMoto->getActiva()) {
            $arregloMotos=$this->getColMotos();
            array_push($arregloMotos, $objMoto);
            $this->setColMotos($arregloMotos);
            $this->setPrecioFinal($this->getPrecioFinal()+$objMoto->darPrecioVenta());
            $respuesta=true;
        } else {
            $respuesta=false;
        }
        return $respuesta;
    }

    /** El método retorna la sumatoria del precio venta de cada una de las motos Nacionales vinculadas a la venta
     * 
    */
    public function retornarTotalVentaNacional(){
        $sumatoriaVentaNacional=-1;
        $colMotosCopia=$this->getColMotos();
        foreach ($colMotosCopia as $objMoto) {
            if (is_a($objMoto, 'MotoNacional')){
                $sumatoriaVentaNacional+=$objMoto->darPrecioVenta();
            }
        }
        return $sumatoriaVentaNacional;
    }

    /** El método retorna una colección de motos importadas vinculadas a la venta. Si la venta solo se corresponde con motos Nacionales la colección 
     * retornada debe ser vacía. 
     * 
    */
    public function retornarMotosImportadas(){
        $colMotosImportadas=[];
        $colMotosCopia=$this->getColMotos();
        foreach ($colMotosCopia as $objMoto) {
            if (is_a($objMoto, 'MotoImportada')) {
                array_push($colMotosImportadas, $objMoto);
            }
        }
        return $colMotosImportadas;
    }
}
?>