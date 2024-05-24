<?php
class MotoNacional extends Moto{
    private $porcentajeDescuentoIncentivo;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrementoAnual, $activa, $porcentajeDescuentoIncentivo=15){
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrementoAnual, $activa);
        $this->porcentajeDescuentoIncentivo=$porcentajeDescuentoIncentivo;
    }

    /**
     * Get the value of porcentajeDescuentoIncentivo
     */
    public function getPorcentajeDescuentoIncentivo() {
        return $this->porcentajeDescuentoIncentivo;
    }

    /**
     * Set the value of porcentajeDescuentoIncentivo
     */
    public function setPorcentajeDescuentoIncentivo($porcentajeDescuentoIncentivo){
        $this->porcentajeDescuentoIncentivo = $porcentajeDescuentoIncentivo;
    }

    public function __toString(){
        $cadena=parent::__toString();
        $cadena.="\nDescuento incentivo nacional: ". $this->getPorcentajeDescuentoIncentivo(). "%\n";
        return $cadena;
    }

    public function darPrecioVenta(){
        $precioVenta=parent::darPrecioVenta();
        $porcentajeDescuentoIncentivo=$this->getPorcentajeDescuentoIncentivo();
        if ($precioVenta!=-1) {
            $precioVenta=$precioVenta - ($precioVenta*$porcentajeDescuentoIncentivo/100);
        }
        return $precioVenta;
    }
}
?>