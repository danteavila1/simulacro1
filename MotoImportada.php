<?php 

include_once "Moto.php";

Class MotoImportada extends Moto {
    
    private $pais;
    private $importeImpuesto;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa, $pais, $importeImpuesto) {
        parent ::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa);
        $this->pais = $pais;
        $this->importeImpuesto = $importeImpuesto;
    }

	public function getPais() {
		return $this->pais;
	}

	public function setPais($value) {
		$this->pais = $value;
	}

	public function getImporteImpuesto() {
		return $this->importeImpuesto;
	}

	public function setImporteImpuesto($value) {
		$this->importeImpuesto = $value;
	}

    public function __toString(){
        return parent::__toString() ."\n".
        $this->getPais() ."\n". $this->getImporteImpuesto() ."\n" ;
    }

    public function darPrecioVenta () {
        $venta = parent::darPrecioVenta();
       
        if($venta != -1) {
            $venta = $venta + $this->getImporteImpuesto();
        }
        return $venta;
    }
}