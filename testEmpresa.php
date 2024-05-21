<?php

include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'MotoNacional.php';
include_once 'MotoImportada.php';
include_once 'Venta.php';
include_once 'Empresa.php';

$objCliente1 = new Cliente("Dante", "Avila", true, "dni", 123456);
$objCliente2 = new Cliente("Dan", "Av", false, "dni", 234567);

$objMoto1 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto2 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto3 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false, 15);
$objMoto4 = new MotoImportada(14, 999900, 2024, "Zanella Patagonian Eagle 250", 55, true, "Francia", 6244400);

$objEmpresa = new Empresa("Alta Gama","Av Argentina 123", [$objCliente1, $objCliente2],[$objMoto1, $objMoto2, $objMoto3, $objMoto4], []);

$objEmpresa->registrarVenta([11,12,13], $objCliente2);

echo($objEmpresa->__toString());
