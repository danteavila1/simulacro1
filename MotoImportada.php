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
        return $this->getCodigo() ."\n". $this->getCosto() ."\n".
        $this->getAnioFabricacion() ."\n". $this->getDescripcion() ."\n".
        $this->getPorcentajeIncrementoAnual() ."\n". $this->getActiva() ."\n".
        $this->getPais() ."\n". $this->getImporteImpuesto() ."\n" ;
    }

    public function darPrecioVenta () {
        $venta = 0;
        $anio =  date("Y")-$this->getAnioFabricacion();
       
        if($this->getActiva()==false) {
            $venta = -1;
        } else {
            $venta = $this->getCosto() + $this->getCosto() * ($anio * $this->getPorcentajeIncrementoAnual());
           $venta = $venta + $this->getImporteImpuesto();
        }
        return $venta;
    }
}