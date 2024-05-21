<?php
class Cliente {
    private $nombre;
    private $apellido;
    private $boolBaja;
    private $tipoDoc;
    private $numDoc;

    public function __construct($nombre, $apellido, $boolBaja, $tipoDoc, $numDoc) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->boolBaja = $boolBaja;
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getBoolBaja() {
        return $this->boolBaja;
    }
    public function getTipoDoc() {
        return $this->tipoDoc;
    }
    public function getNumDoc() {
        return $this->numDoc;
    }

    public function setNombre ($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido ($apellido) {
        $this->apellido = $apellido;
    }
    public function setBoolBaja ($boolBaja) {
        $this->boolBaja = $boolBaja;
    }
    public function setTipoDoc ($tipoDoc) {
    $this->tipoDoc = $tipoDoc;
    }
    public function setNumDoc ($numDoc) {
        $this->numDoc = $numDoc;
    }


    public function __toString(){
        return 
        $this->getNombre() ."\n". 
        $this->getApellido() ."\n". 
        $this->getBoolBaja() ."\n". 
        $this->getTipoDoc() ."\n". 
        $this->getNumDoc() ."\n";
    }

}

