<?php
include_once "Cliente.php";
include_once "Moto.php";
include_once "MotoImportada.php";
include_once "MotoNacional.php";
include_once "Venta.php";
include_once "Empresa.php";

$objCliente1=new Cliente("Edgard", "Poe", false, "DNI", 33444555);
$objCliente2=new Cliente("Mirtha", "Legrand", false, "DNI", 11222333);

$objMoto11=new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto12=new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto13=new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false, 0);
$objMoto14=new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii190cc Plr", 100, true, "Francia", 6244400);

$objEmpresa1=new Empresa("Alta Gama", "Av. Argentina 123", [$objCliente1, $objCliente2],[$objMoto11, $objMoto12, $objMoto13, $objMoto14], []);

echo "Precio Final 1er Venta: $". $objEmpresa1->registrarVenta([11, 12, 13, 14], $objCliente2). "\n";

echo "Precio Final 2da Venta: $". $objEmpresa1->registrarVenta([13, 14], $objCliente2). "\n";

echo "Precio Final 3ra Venta: $". $objEmpresa1->registrarVenta([14, 2], $objCliente2). "\n";

foreach ($objEmpresa1->informarVentasImportadas() as $objVenta) {
    echo $objVenta;
}

echo "Suma de ventas nacionales: $".$objEmpresa1->informarSumaVentasNacionales()."\n";

echo $objEmpresa1;
?>