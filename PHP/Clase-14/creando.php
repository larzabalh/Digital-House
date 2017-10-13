<?php

include 'libreria.php';

$hernan = new Persona('Hernan','Larzabal',28468190,'30-12-1980','larzabalh@hotmail.com','1234');

echo $hernan->getNombre();

// $cuenta1 = new Cuenta(23140923402340);
// $cuenta1->setBalance(300);
// $cuenta1->debitar(20,'banelco','30-12-2017');
//
// var_dump($cuenta1);

$cuenta_classic = new Classic(23140923402340);
$cuenta_classic->setBalance(300);
$cuenta_classic->debitar(20,'banelco','30-12-2017');

var_dump($cuenta_classic);

 ?>
