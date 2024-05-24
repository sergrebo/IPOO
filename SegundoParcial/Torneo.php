<?php
class Torneo{
    private $colPartidos;
    private $premio;

    public function __construct($colPartidos, $premio){
        $this->colPartidos=$colPartidos;
        $this->premio=$premio;
    }

    public function getColPartidos() {
        return $this->colPartidos;
    }
    public function setColPartidos($colPartidos){
        $this->colPartidos = $colPartidos;
    }

    public function getPremio() {
        return $this->premio;
    }
    public function setPremio($premio){
        $this->premio = $premio;
    }

    public function __toString(){
        return "Partidos:\n". $this->encadenarPartidos(). "Premio: ". $this->getPremio();
    }

    public function encadenarPartidos(){
        $cadenaPartidos="";
        $colPartidosCopia=$this->getColPartidos();
        foreach ($colPartidosCopia as $partido) {
            $cadenaPartidos.=$partido."\n";
        }
        return $cadenaPartidos;
    }

    /** Recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol. El método debe crear y retornar
     *  la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los 2 equipos tengan la misma 
     *  categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo.
     */
    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){
        $nuevoPartido=null;
        $colPartidosCopia=$this->getColPartidos();
        $catEquipo1=$objEquipo1->getObjCategoria();
        $catEquipo2=$objEquipo2->getObjCategoria();
        $nroJugadoresEquipo1=$objEquipo1->getCantJugadores();
        $nroJugadoresEquipo2=$objEquipo2->getCantJugadores();
        $idNuevoPartido=count($colPartidosCopia);

        if ($catEquipo1==$catEquipo2 && $nroJugadoresEquipo1==$nroJugadoresEquipo2) {
            if ($tipoPartido=="futbol") {
                $nuevoPartido=new PartidoFutbol($idNuevoPartido, date("d/m/Y"), $objEquipo1, 0, $objEquipo2, 0);
            } elseif ($tipoPartido=="basquet") {
                $nuevoPartido=new PartidoBasquet($idNuevoPartido, date("d/m/Y"), $objEquipo1, 0, $objEquipo2, 0, 0);
            }
        }
        if (!is_null($nuevoPartido)) {
            array_push($colPartidosCopia, $nuevoPartido);
            $this->setColPartidos($colPartidosCopia);
        }
        return $nuevoPartido;
    }

    /** Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se trata de un partido de fútbol o de básquetbol y en base al 
     *  parámetro busca entre esos partidos los equipos ganadores (equipo con mayor cantidad de goles). El método retorna una colección con los objetos de los equipos
     *  encontrados.
     */
    public function darGanadores($deporte){
        $colPartidosCopia=$this->getColPartidos();
        $colEquiposGanadores=[];
        if ($deporte=="futbol") {
            $clasePartido='PartidoFutbol';
        } elseif ($deporte=="basquet") {
            $clasePartido='PartidoBasquet';
        }
        foreach ($colPartidosCopia as $partido) {
            if (is_a($partido, $clasePartido)) {
                $equipoGanador=$partido->darEquipoGanador();
                array_push($colEquiposGanadores, $equipoGanador);
            }
        }
        return $colEquiposGanadores;
    }

    /** Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’ y contiene la 
     *  referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el
     *  torneo. (premioPartido = Coef_partido * ImportePremio)
     */
    public function calcularPremioPartido($objPartido){
        $equipoGanador=$objPartido->darEquipoGanador();
        $premioPartido=$objPartido->coeficientePartido()* $this->getPremio();
        $arreglo=['equipoGanador'=>$equipoGanador, 'premioPartido'=>$premioPartido];
        return $arreglo;
    }
?>