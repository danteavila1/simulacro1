<?php

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

    public function retornarCadena($cadena){
        $nuevaCadena = "";
        foreach ($cadena as $valor){
            $nuevaCadena .= $valor . "\n";
        }
        return $nuevaCadena;
    }


    public function __toString(){
        return "". $this->denominacion. "". $this->direccion ."". $this->retornarCadena($this->arrayClientes)."". $this->retornarCadena($this->arrayMotos)."". $this->retornarCadena($this->arrayVentas)."";
    }

   public function retornarMoto($codigoMoto){
    $exito = false;
    $i = 0;
    $colMotos = $this->getArrayMotos();
    $objMotoEncontrada = null;

    while($exito == false && $i<count($colMotos)){
        if($colMotos[$i]->getCodigo() == $codigoMoto){
            $exito = true;
            $objMotoEncontrada= $colMotos[$i];
        } else{
            $i++;
        }
        }
        return $objMotoEncontrada;
    }

    public function registrarVenta($colCodigosMoto, $objCliente){
       
        $importeFinal = 0;
        
        
        if($objCliente->getBoolBaja()==false){
            $motosAVender = [];
            foreach ($colCodigosMoto as $unCodigoMoto){
                $unObjMoto = $this->retornarMoto($unCodigoMoto);
                if($unObjMoto!=null && $unObjMoto->getActiva()){
                    array_push($motosAVender, $unObjMoto);
                    $importeFinal = $importeFinal + $unObjMoto->darPrecioVenta();
                }
            }
            if(count($motosAVender)>0){
                $copiaColVentas = $this->getArrayVentas();
                $idVenta = count($copiaColVentas)+1;
                $nuevaVenta = new Venta($idVenta, date("m/d/y"), $objCliente, $motosAVender, $importeFinal);
                array_push($copiaColVentas, $nuevaVenta);
                $this->setArrayVentas($copiaColVentas);
            } 
        } else {
            $importeFinal = -1;
        }
        return $importeFinal;
    }

    public function informarSumaVentasNacionales(){
        $sumaVentas = 0;
        $arrayVentas = $this->getArrayVentas();
        for($i=0;$i<count($arrayVentas);$i++){
           $sumaVentas += $arrayVentas[$i]->retornarTotalVentaNacional();
        }
        return $sumaVentas;
    }

    public function informarVentasImportadas(){
        $colVentasImportadas = [];
        $arrayVentas = $this->getArrayVentas();
        for($i=0;$i<count($arrayVentas);$i++){
            $colVentasImportadas[] = $arrayVentas[$i]->retornarMotosImportadas();
        }
        return $colVentasImportadas;
    }

   }



