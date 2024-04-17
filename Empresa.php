<?php

include "Venta.php";

class Empresa {
    private $denominacion;
    private $direccion;
    private $arrayClientes;
    private $arrayMotos;
    private $arrayVentas;

    public function __construct($denominacion, $direccion, $arrayClientes, $arrayMotos, $arrayVentas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->arrayClientes = $arrayClientes;
        $this->arrayMotos = $arrayMotos;
        $this->arrayVentas = $arrayVentas;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getdireccion(){
        return $this->direccion;
    }   
    public function getArrayClientes(){
        return $this->arrayClientes;
    }
    public function getArrayMotos(){
        return $this->arrayMotos;
    }
    public function getArrayVentas(){
        return $this->arrayVentas;
    }
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function setArrayClientes($arrayClientes){
        $this->arrayClientes = $arrayClientes;
    }
    public function setArrayMotos($arrayMotos){
        $this->arrayMotos = $arrayMotos;
    }
    public function setArrayVentas($arrayVentas){
        $this->arrayVentas = $arrayVentas;
    }

    public function __toString(){
        return "". $this->denominacion. "". $this->direccion ."". $this->arrayClientes."". $this->arrayMotos."". $this->arrayVentas."";
    }

    public function retornarMoto($codigoMoto) {
        $numMotos = count($this->arrayMotos);
        $i = 0;
        while ($i < $numMotos) {
            if ($this->arrayMotos[$i]->getCodigo() === $codigoMoto) {
                return $this->arrayMotos[$i];
            }
            $i++;
        }
        return null;
    }

    public function registrarVenta($colCodigosMoto, $objCliente) {
        $nuevaVenta = new Venta(null,date('m.d.y'),$objCliente, [], 0);
        $precioFinal = 0;
        if($objCliente->getBoolBaja() === false) {
            for($i=0; $i<count($colCodigosMoto); $i++){
                $motoRetornada = $this->retornarMoto($colCodigosMoto[$i]);
                if($motoRetornada!=null) {
                    $nuevaVenta->setArrayMotos($motoRetornada);
                    $nuevaVenta->setPrecioVenta($this->arrayMotos[$i]->darPrecioVenta());
                    $nuevaVenta->setNumero(count($this->arrayVentas)+ 1);
                    $this->arrayVentas[] = $nuevaVenta;
                    $precioFinal += $this->arrayMotos[$i]->darPrecioVenta();
                }
            }
        }
        return $precioFinal;
    }

    public function retornarVentasXCliente($tipo, $numDoc){
        $i=0;
        $ventasAlCliente=[];
        $exito=false;
        while($exito==false && $i<count($this->arrayClientes)){
            if($tipo==$this->arrayClientes[$i]->getTipoDocumento() && $numDoc==$this->arrayClientes[$i]->getNumDocumento()){
                $cliente[] = $this->arrayClientes[$i];
                for($j=0; $j<count($this->arrayVentas); $j++){
                    if($this->arrayVentas[$j]->getObjCliente() == $cliente){
                        $ventasAlCliente[] = $this->arrayVentas[$j];
                    }
                }
                $exito = true;
            }
            $i++;
        }
        return $ventasAlCliente;
    }
        



}