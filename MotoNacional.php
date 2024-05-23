<?php 

include_once "Moto.php";

Class MotoNacional extends Moto {
    
    private $porcentajeDescuento;


    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa, $porcentajeDescuento) {
        parent ::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa);
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function getPorcentajeDescuento() {
		return $this->porcentajeDescuento;
	}

	public function setPorcentajeDescuento($value) {
		$this->porcentajeDescuento = $value;
	}

	
    public function __toString(){
        return parent::__toString() ."\n".
        $this->getPorcentajeDescuento()."\n";
    }

    public function darPrecioVenta () {
        $venta = parent::darPrecioVenta();
        $porcentajeDescuento = $this->getPorcentajeDescuento();
        if($venta!=-1) {
            $venta = $venta - ($venta * $porcentajeDescuento / 100);
        }
        return $venta;
    }

}