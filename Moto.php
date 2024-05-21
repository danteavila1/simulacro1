<?php
class Moto {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa) {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }

    public function getCodigo() {
        return $this->codigo;
    }
    public function getCosto() {
        return $this->costo;
    }
    public function getAnioFabricacion() {
        return $this->anioFabricacion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getPorcentajeIncrementoAnual() {
        return $this->porcentajeIncrementoAnual;
    }
    public function getActiva() {
        return $this->activa;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    public function setCosto($costo) {
        $this->costo = $costo;
    }
    public function setAnioFabricacion($anioFabricacion) {
        $this->anioFabricacion = $anioFabricacion;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual) { 
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }
    public function setActiva($activa) {
        $this->activa = $activa;
    }

    public function __toString() {
        return $this->codigo ."\n". $this->costo ."\n". $this->anioFabricacion ."\n". $this->descripcion ."\n". $this->porcentajeIncrementoAnual ."\n". $this->activa ."\n";
    }

    public function darPrecioVenta () {
        $venta = 0;
        $anio =  date("Y")-$this->anioFabricacion;
        if($this->activa==false) {
            $venta = -1;
        } else {
            $venta = $this->costo + $this->costo * ($anio * $this->porcentajeIncrementoAnual);
        }
        return $venta;
    }

}

?>