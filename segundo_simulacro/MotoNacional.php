<?php
class MotoNacional extends Moto{
    private $porcentajeDescuentoIncentivo;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrementoAnual, $activa, $porcentajeDescuentoIncentivo){
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrementoAnual, $activa);
        $this->porcentajeDescuentoIncentivo=15;
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
        $precioBase=parent::darPrecioVenta();
        $porcentajeDescuentoIncentivo=$this->getPorcentajeDescuentoIncentivo();
        $precioVenta=$precioBase - ($precioBase*$porcentajeDescuentoIncentivo/100);
        return $precioVenta;
    }
}
?>