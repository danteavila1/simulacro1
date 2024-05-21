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
        return $this->getCodigo() ."\n". $this->getCosto() ."\n".
        $this->getAnioFabricacion() ."\n". $this->getDescripcion() ."\n".
        $this->getPorcentajeIncrementoAnual() ."\n". $this->getActiva() ."\n".
        $this->getPorcentajeDescuento()."\n";
    }

    public function darPrecioVenta () {
        $venta = 0;
        $anio =  date("Y")-$this->getAnioFabricacion();
        $porcentajeDescuento = $this->getPorcentajeDescuento();
        if($this->getActiva()==false) {
            $venta = -1;
        } else {
            $venta = $this->getCosto() + $this->getCosto() * ($anio * $this->getPorcentajeIncrementoAnual());
            $venta = $venta - ($venta * $porcentajeDescuento / 100);
        }
        return $venta;
    }

}