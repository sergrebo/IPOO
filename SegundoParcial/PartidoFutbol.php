<?php
class PartidoFutbol extends Partido{
    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $coefMenores=0.13, $coefJuveniles=0.19, $coefMayores=0.27){
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->coefMenores=$coefMenores;
        $this->coefJuveniles=$coefJuveniles;
        $this->coefMayores=$coefMayores;
    }

    public function getCoefMenores() {
        return $this->coefMenores;
    }
    public function setCoefMenores($coefMenores){
        $this->coefMenores = $coefMenores;
    }

    public function getCoefJuveniles() {
        return $this->coefJuveniles;
    }
    public function setCoefJuveniles($coefJuveniles){
        $this->coefJuveniles = $coefJuveniles;
    }

    public function getCoefMayores() {
        return $this->coefMayores;
    }
    public function setCoefMayores($coefMayores){
        $this->coefMayores = $coefMayores;
    }

    public function __toString(){
        $cadena=parent::__toString();
        $cadena.= "Coeficiente menores: ". $this->getCoefMenores(). " | Coeficiente juveniles: ". $this->getCoefJuveniles(). " | Coeficiente mayores: ". $this->getCoefMayores();
        return $cadena;
    }

    public function coeficientePartido(){
        $catPartido=$this->getObjEquipo1()->getObjCategoria();
        $golesTotales=$this->getCantGolesE1()+$this->getCantGolesE2();
        $nroJugadores=($this->getObjEquipo1()->getCantJugadores())*2;
        if ($catPartido->getDescripcion()=='Menores') {
            $coefPartido=$this->getCoefMenores()*$golesTotales*$nroJugadores;
        } elseif ($catPartido->getDescripcion()=='juveniles') {
            $coefPartido=$this->getCoefJuveniles()*$golesTotales*$nroJugadores;
        } elseif ($catPartido->getDescripcion()=='Mayores') {
            $coefPartido=$this->getCoefMayores()*$golesTotales*$nroJugadores;
        }
        return $coefPartido;
    }
}


?>