<?php

include 'Cliente.php';

include 'Empresa.php';

$objCliente1 = new Cliente("Dante", "Avila", true, "dni", 123456);
$objCliente2 = new Cliente("Dan", "Av", false, "dni", 234567);

$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

$objEmpresa = new Empresa("Alta Gama","Av Argentina 123", [$objCliente1, $objCliente2],[$objMoto1, $objMoto2, $objMoto3], []);

echo $objEmpresa->registrarVenta([11,12,13], $objCliente2);

$ventas= $objEmpresa->getArrayVentas();

for($i=0; $i < count($ventas); $i++){
    echo $ventas[$i];
}