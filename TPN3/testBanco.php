<?php
include "./Persona.php";
include "./Cliente.php";
include "./Cuenta.php";
include "./CuentaAhorro.php";
include "./CuentaCorriente.php";
include "./Banco.php";

$objCliente1=new Cliente(33823405, "Sergio", "Rebolledo", 1);
$objCliente2=new Cliente(11222333, "Pepe", "Parada", 2);
$objCliente3=new Cliente(44555666, "Silvia", "Sanchez", 3);

$objCuentaAhorro1=new CuentaAhorro($objCliente1, 100);
$objCuentaAhorro2=new CuentaAhorro($objCliente2, 2000);

$objCuentaCorriente1=new CuentaCorriente($objCliente1, 100, 500);
$objCuentaCorriente3=new CuentaCorriente($objCliente3, 5000, 2000);

$objBanco=new Banco([$objCuentaCorriente1, $objCuentaCorriente3], [$objCuentaAhorro1, $objCuentaAhorro2], 3, [$objCliente1, $objCliente2, $objCliente3]);

$crearCC=$objBanco->incorporarCuentaCorriente(4, 500);
if ($crearCC) {
    echo $objBanco;
} else {
    echo "Cliente no encontrado";
}

/*
$retiroRealizado=$objCuentaAhorro1->realizarRetiro(50);
if($retiroRealizado){
    echo $objCuentaAhorro."\n";
} else {
    echo "Saldo insuficiente.\n";
}

$retiroRealizado=$objCuentaCorriente1->realizarRetiro(200);
if ($retiroRealizado) {
    echo $objCuentaCorriente."\n";
} else {
    echo "Saldo insuficiente.\n";
}
*/
?>