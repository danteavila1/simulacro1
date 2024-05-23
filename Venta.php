<?php

class Venta {
    private $numero;
    private $fecha;
    private $objCliente;
    private $colMotos;
    private $precioVenta;

    public function __construct($numero, $fecha, $objCliente, $colMotos, $precioVenta) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->colMotos = $colMotos;
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
    public function getColMotos() {
        return $this->colMotos;
    }
    public function getPrecioVenta() {
        return $this->precioVenta;
    }
    public function setPrecioVenta($objPrecioVenta){
        $this->precioVenta = $objPrecioVenta;
    }
    public function setColMotos($arrayMotos){
        $this->colMotos = $arrayMotos;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }  
    public function setObjCliente($objCliente){
        $this->objCliente = $objCliente;
    }

    public function __toString() {
        $motosInfo = "";
        foreach ($this->colMotos as $moto) {
            $motosInfo .= $moto . "\n";
        }
        return "Número: " . $this->numero . ", Fecha: " . $this->fecha . ", Cliente: " . $this->objCliente . "\nMotos:\n" . $motosInfo . "Precio final: $" . $this->precioVenta;
    }

    public function incorporarMoto($objMoto){
        
        if($objMoto->getActiva()){
            $colMotosCopia = $this->getColMotos();
            $colMotosCopia[] = $objMoto;
            $this->setColMotos($colMotosCopia);

            $precioMoto = $objMoto->darPrecioVenta();
            $precioFinalCopia = $this->getPrecioVenta();
            $precioFinalCopia += $precioMoto;
            $this->setPrecioVenta($precioFinalCopia);
        }
    }

    public function retornarTotalVentaNacional(){
        $colMotos = $this->getColMotos();
        $total = 0;
        for($i=0 ; $i<count($colMotos) ; $i++){
            if($colMotos[$i] instanceof MotoNacional){
                if($colMotos[$i] != -1){
                    $total += $colMotos[$i]->darPrecioVenta();
                }
            }
          
        }
        return $total;
    }

    public function retornarMotosImportadas() {
        $motosImportadas = [];
        foreach ($this->colMotos as $moto) {
            if ($moto instanceof MotoImportada) {
                $motosImportadas[] = $moto;
            }
        }
        return $motosImportadas;
    }

}


?>