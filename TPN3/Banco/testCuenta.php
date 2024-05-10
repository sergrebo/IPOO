<?php
include "./Persona.php";
include "./Cliente.php";
include "./Cuenta.php";
include "./CuentaAhorro.php";
include "./CuentaCorriente.php";

$objCliente=new Cliente(33823405, "Sergio", "Rebolledo", 1);

$objCuentaAhorro=new CuentaAhorro($objCliente, 100);

$objCuentaCorriente=new CuentaCorriente($objCliente, 100, 500);

$retiroRealizado=$objCuentaAhorro->realizarRetiro(50);
if($retiroRealizado){
    echo $objCuentaAhorro."\n";
} else {
    echo "Saldo insuficiente.\n";
}

$retiroRealizado=$objCuentaCorriente->realizarRetiro(200);
if ($retiroRealizado) {
    echo $objCuentaCorriente."\n";
} else {
    echo "Saldo insuficiente.\n";
}
?>