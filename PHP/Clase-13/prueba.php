<?php

require 'usuario.php';

// $hernan = new Usuario();
// $hernan -> nombre = 'HERNAN';
// $hernan -> mail = 'larzabalh@hotmail.com';
// $hernan -> fecha= '30/12/1980';

// echo "Datos de Usuario 1: {$hernan->nombre}, mail: {$hernan->mail} y fecha de nacimiento: {$hernan->fecha}";

$gisela =new Usuario('Gisela','gisela@gmail.com','22/01/1979',38);
// echo "Datos de Usuario 2: {$gisela->nombre}, mail: {$gisela->mail} y fecha de nacimiento: {$gisela->fecha}"."<br>";

$omar =new Usuario('Omar','omar@gmail.com','24/03/1951',66);
// echo "Datos de Usuario 3: {$omar->nombre}, mail: {$omar->mail} y fecha de nacimiento: {$omar->fecha}"."<br>";

// $gisela ->mail ='cambiomail@gmail.com';
// echo "Datos de Usuario 2: {$gisela->nombre}, mail: {$gisela->mail} y fecha de nacimiento: {$gisela->fecha}"."<br>";

var_dump($gisela);
echo "<br>";

var_dump($omar);
echo "<br>";

echo $gisela->getNombre();
echo "<br>";

echo $gisela->getMail();
echo "<br>";

echo $gisela->getFecha();
echo "<br>";

echo $gisela->setNombre('loca');
echo "<br>";
echo $gisela->getNombre();
echo "<br>";

echo $gisela->setMail('loca@gmail.com');
echo "<br>";

echo $gisela->setEdad(30.2);
echo "<br>";

echo $gisela->calcularedad('1972-12-30');
echo "<br>";



 ?>
