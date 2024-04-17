<?php
include "Moto.php";
class Venta {
    private $numero;
    private $fecha;
    private $objCliente;
    private $arrayMotos;
    private $precioVenta;

    public function __construct($numero, $fecha, $objCliente, $arrayMotos, $precioVenta) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->arrayMotos = $arrayMotos;
        $this->precioVenta = $precioVenta;
    }

    public function getNumero() {
        return $this->numero;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getObjCliente() {
        return $this->objCliente;
    }
    public function getArrayMotos() {
        return $this->arrayMotos;
    }
    public function getPrecioVenta() {
        return $this->precioVenta;
    }
    public function setPrecioVenta($objPrecioVenta){
        $this->precioVenta = $objPrecioVenta;
    }
    public function setArrayMotos($arrayMotos){
        $this->arrayMotos[] = $arrayMotos;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }  
    public function setObjCliente($objCliente){
        $this->objCliente[] = $objCliente;
    }

    public function __toString() {
        $motosInfo = "";
        foreach ($this->arrayMotos as $moto) {
            $motosInfo .= $moto . "\n";
        }
        return "Número: " . $this->numero . ", Fecha: " . $this->fecha . ", Cliente: " . $this->objCliente . "\nMotos:\n" . $motosInfo . "Precio final: $" . $this->precioVenta;
    }

    public function incorporarMoto($objMoto){
        $exito = true;
        if($objMoto->darPrecioVenta()<0){
            $exito=false;
        } else {
            $this->precioVenta = $objMoto->darPrecioVenta;
            $this->arrayMotos[] = $objMoto;
        }
        return $exito;
    }

}


?>