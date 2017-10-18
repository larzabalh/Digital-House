<?php

require_once 'libreria/libreria.php';

$hernan = new Persona('Hernan','Larzabal',28468190,'30-12-1980','larzabalh@hotmail.com','1234');

echo $hernan->getNombre();
echo "<br>";

// $cuenta1 = new Cuenta(23140923402340);
// $cuenta1->setBalance(300);
// $cuenta1->debitar(20,'banelco','30-12-2017');
//
// var_dump($cuenta1);

$cuenta_classic = new Classic(23140923402340);
$cuenta_classic->setBalance(300);
echo $cuenta_classic->getBalance();
echo "<br>";
$cuenta_classic->debitar(20,'banelco','30-12-2017');
echo $cuenta_classic->getBalance();
$cuenta_classic ->getBalance();
echo "<br>";

var_dump($cuenta_classic);
echo "<br>";
 ?>
