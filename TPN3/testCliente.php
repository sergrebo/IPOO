<?php
include "Persona.php";
include "Cliente.php";
$objCliente=new cliente(99666111, "Ernesto", "Sabato", 599666111);
echo $objCliente;

$objCliente->setNombre("Sandro");
echo "\n". $objCliente;

$objCliente->setNroCliente(5287);
echo "\n". $objCliente;
?>