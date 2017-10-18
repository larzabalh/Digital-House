<?php
require_once "require_classes.php";

$cliente1 = new Persona(
	new Classic('05869584-75569865471253'),
	'dpgover@gmail.com',
	'sthshst',
	'dghsdgh',
	'dhgaeh',
	32568965,
	'1956-01-21'
);

$cliente1->getCuenta()->acreditar(1000);
echo $cliente1->getCuenta()->getBalance() . '<br/>';

$cliente1->getCuenta()->debitar(100, Cuenta::ORIGEN_BANELCO);
echo $cliente1->getCuenta()->getBalance() . '<br/>';