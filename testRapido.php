<?php


include "Venta.php";


$objMoto = new Moto(123, 10000, 2020, "nueva", 10, true);

$venta = new Venta (12, 2024, [], [], 0);


$venta -> incorporarMoto($objMoto);

echo $venta -> getPrecioVenta();

