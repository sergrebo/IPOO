<?php
//Ss
class Viaje{
    private $codigo;
    private $destino;
    private $pasajeMaximo;
    private $coleccionPasaje;
    private $objResponsable;

    public function __construct($codigo, $destino, $pasajeMaximo, $coleccionPasaje, $objResponsable){
        $this->codigo=$codigo;
        $this->destino=$destino;
        $this->pasajeMaximo=$pasajeMaximo;
        $this->coleccionPasaje=$coleccionPasaje;
        $this->objResponsable=$objResponsable;
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

    public function __toString(){
        return "Código de viaje: ". $this->getCodigo(). "\nDéstino: ". $this->getDestino(). "\nCantidad máxima de pasajeros: ". $this->getPasajeMaximo(). "\nPasajeros: \n". $this->listarPasaje() ."Responsable: ". $this->getObjResponsable();
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

    /**Recibe los datos del nuevo pasajero, crea un nuevo objPasajero y lo incluye en colPasaje de Viaje
     * @param INT $dni, $telefono
     * @param STRING $nombre, $apellido
     */
    public function incorporarNuevoPasajero($dni, $nombre, $apellido, $telefono){
        $colPasajeCopia=$this->getColeccionPasaje();
        $nuevoObjPasajero=new Pasajero($nombre, $apellido, $dni, $telefono);
        array_push($colPasajeCopia, $nuevoObjPasajero);
        $this->setColeccionPasaje($colPasajeCopia);
    }

}
?>