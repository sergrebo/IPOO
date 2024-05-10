<?php
include "./Persona.php";
include "./Cliente.php";
include "./Cuenta.php";
include "./CuentaAhorro.php";
include "./CuentaCorriente.php";
include "./Banco.php";

$objBanco=new Banco([], [], 0, []);

$objCliente1=new Cliente(33823405, "Sergio", "Rebolledo", 1);
$objCliente2=new Cliente(11222333, "Pepe", "Parada", 2);

$objBanco->incorporarCliente($objCliente1);
$objBanco->incorporarCliente($objCliente2);

$objBanco->incorporarCuentaCorriente(1, 1000);
$objBanco->incorporarCuentaCorriente(2, 1000);

$objBanco->incorporarCajaAhorro(1);
$objBanco->incorporarCajaAhorro(1);
$objBanco->incorporarCajaAhorro(2);

$objBanco->realizarDeposito(3, 300);
$objBanco->realizarDeposito(4, 300);
$objBanco->realizarDeposito(5, 300);

$objBanco->realizarRetiro(1, 150);
$objBanco->realizarDeposito(5, 150);

echo $objBanco;



/*
$objCliente1=new Cliente(33823405, "Sergio", "Rebolledo", 1);
$objCliente2=new Cliente(11222333, "Pepe", "Parada", 2);
$objCliente3=new Cliente(44555666, "Silvia", "Sanchez", 3);

$objCuentaAhorro1=new CuentaAhorro($objCliente1, 100);
$objCuentaAhorro2=new CuentaAhorro($objCliente2, 2000);

$objCuentaCorriente1=new CuentaCorriente($objCliente1, 100, 500);
$objCuentaCorriente3=new CuentaCorriente($objCliente3, 5000, 2000);

$objBanco=new Banco([$objCuentaCorriente1, $objCuentaCorriente3], [$objCuentaAhorro1, $objCuentaAhorro2], 3, [$objCliente1, $objCliente2, $objCliente3]);

$crearCC=$objBanco->incorporarCuentaCorriente(4, 500);
if (is_null($crearCC)) {
    echo "Cliente no encontrado";
} else {
    echo $objBanco;
}

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