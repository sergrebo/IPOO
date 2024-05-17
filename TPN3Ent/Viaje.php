<?php
//Ss
class Viaje{
    private $codigo;
    private $destino;
    private $pasajeMaximo;
    private $coleccionPasaje;
    private $objResponsable;
    private $costoViaje;
    private $sumaAbonada;

    public function __construct($codigo, $destino, $pasajeMaximo, $coleccionPasaje, $objResponsable, $costoViaje, $sumaAbonada){
        $this->codigo=$codigo;
        $this->destino=$destino;
        $this->pasajeMaximo=$pasajeMaximo;
        $this->coleccionPasaje=$coleccionPasaje;
        $this->objResponsable=$objResponsable;
        $this->costoViaje=$costoViaje;
        $this->sumaAbonada=$sumaAbonada;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getPasajeMaximo(){
        return $this->pasajeMaximo;
    }
    public function getColeccionPasaje(){
        return $this->coleccionPasaje;
    }
    public function getObjResponsable(){
        return $this->objResponsable;
    }
    public function getCostoViaje(){
        return $this->costoViaje;
    }
    public function getSumaAbonada(){
        return $this->sumaAbonada;
    }

    public function setCodigo($nuevoCodigo){
        $this->codigo=$nuevoCodigo;
    }
    public function setDestino($nuevoDestino){
        $this->destino=$nuevoDestino;
    }
    public function setPasajeMaximo($nuevoPasajeMaximo){
        $this->pasajeMaximo=$nuevoPasajeMaximo;
    }
    public function setColeccionPasaje($nuevaColeccionPasaje){
        $this->coleccionPasaje=$nuevaColeccionPasaje;
    }
    public function setObjResponsable($nuevoObjResponsable){
        $this->objResponsable=$nuevoObjResponsable;
    }
    public function setCostoViaje($nuevoCostoViaje){
        $this->costoViaje=$nuevoCostoViaje;
    }
    public function setSumaAbonada($nuevaSumaAbonada){
        $this->sumaAbonada=$nuevaSumaAbonada;
    }

    public function __toString(){
        return "Código de viaje: ". $this->getCodigo(). "\nDéstino: ". $this->getDestino(). "\nCantidad máxima de pasajeros: ". $this->getPasajeMaximo(). "\nPasajeros: \n". $this->listarPasaje() ."Responsable: ". $this->getObjResponsable(). "\nCosto del viaje: $". $this->getCostoViaje(). "\nSuma abonada por los pasajeros: $". $this->getSumaAbonada(). "\n";
    }

    public function listarPasaje(){
        $lista="";
        for ($i=0; $i<count($this->getColeccionPasaje()); $i++) { 
            $lista=$lista . $i+1 . ") ". $this->getColeccionPasaje()[$i];
        }
        return $lista;
    }

    /**VERIFICACIÓN DE NO REDUNDANCIA DE PASAJEROS. RETORNA FALSE SI EL DNI INGRESADO POR EL USUARIO NO ESTA INCLUIDO EN LA COLECCION DE OBJETOS PASAJERO
     * @param INT $numDni
     * @return BOOLEAN
     */
    public function verificarPasajero($numDni){
        $posicionObjPasajero=0;
        $objPasajeroEncontrado=false;
        $colPasajeCopia=$this->getColeccionPasaje();
        while (!$objPasajeroEncontrado && $posicionObjPasajero<count($colPasajeCopia)) {
            if ($colPasajeCopia[$posicionObjPasajero]->getNroDni()==$numDni) {
                $objPasajeroEncontrado=true;
            }
            $posicionObjPasajero++;
        }
        return $objPasajeroEncontrado;
    }

    public function venderPasaje($objPasajero){
        $colPasajeCopia=$this->getColeccionPasaje();
        $costoPasajero=-1;
        //Busqueda de espacio en el viaje
        $hayEspacio=$this->hayPasajesDisponible();
        //Verificacion de redundancia en la lista de pasajeros
        $pasajeroCargado=$this->verificarPasajero($objPasajero->getNroDni());
        //Carga del pasajero y del monto abonado
        if ($hayEspacio && !$pasajeroCargado) {
            array_push($colPasajeCopia, $objPasajero);
            $this->setColeccionPasaje($colPasajeCopia);
            $costoViaje=$this->getCostoViaje();
            $sumaAbonada=$this->getSumaAbonada();
            $incrementoPasajero=$objPasajero->darPorcentajeIncremento();
            $costoPasajero=$costoViaje+($costoViaje*$incrementoPasajero/100);
            $sumaAbonada+=$costoPasajero;
            $this->setSumaAbonada($sumaAbonada);
        }
        return $costoPasajero;
    }

public function hayPasajesDisponible(){
    $colPasajeCopia=$this->getColeccionPasaje();
    $maxPasajeros=$this->getPasajeMaximo();
    $hayLugar=false;
    if (count($colPasajeCopia)<$maxPasajeros) {
            $hayLugar=true;
    }
    return $hayLugar;
}
}
?>