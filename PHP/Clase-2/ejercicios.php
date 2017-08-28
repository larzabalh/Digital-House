<?php

$mayor=10;
$menor=5;


if ($mayor>$menor){

  echo "El numero mayor es: $mayor";

} else {
  echo "El numero menor es: $menor";
}

echo '<br>';
echo '<br>';


$aleatorio=rand(1,5);

if ($aleatorio==3 || $aleatorio==5) {
  echo "El numero aleatorio es: $aleatorio";
}

echo '<br>';
echo '<br>';

if ($aleatorio!==3) {
  echo "El numero aleatorio no es: 3";
}else {
  echo "El numero aleatorio es: 3";
}
echo '<br>';
echo '<br>';
print_r($aleatorio);
echo '<br>';
echo '<br>';

$aleatorio2=rand(0,100);

if ($aleatorio2>50) {
  echo "El numero $aleatorio2 es mayor que 50";
}else {
  echo "El numero $aleatorio2 es menor que 50";
}

echo '<br>';
echo '<br>';
print_r($aleatorio2);

echo '<br>';
echo '<br>';

if (($aleatorio2>50 && $aleatorio2%2==0) || $aleatorio2==0) {
  echo "Pasa la condicion, porque el numero $aleatorio2 es mayor que 50 y es par!";
}
echo '<br>';
echo '<br>';
print_r($aleatorio2);

echo '<br>';
echo '<br>';

$edad= 36;
$casado=0;
$sexo="otro";

if ($edad>18 && $casado==false) {
  echo "Bienvenido";
}else if ($sexo=="otro") {
  echo "Bienvenido";
}



echo '<br>';
echo '<br>';
print_r($edad);
echo '<br>';
print_r($casado);
echo '<br>';
print_r($sexo);

echo '<br>';
echo '<br>';

$cantidadDeAlumnos=25;

if ($cantidadDeAlumnos) {
  echo "true";

}else {
  echo "false";
}

echo '<br>';
echo '<br>';

// NOTE: if ternarios:

$cantidadDeAlumnos? 'echo "true"':'"false"';
print_r($casado);

echo '<br>';
echo '<br>';


echo "EJERCICIO 8";
echo '<br>';
echo "ESTO ES: ".$i=0? "TRUE":"FALSE";
echo '<br>';
echo '<br>';

echo "EJERCICIO 9";
echo '<br>';
$aleatorio3=rand(1,20);
echo "El numero aleatorio3 es " .($aleatorio3%2==0?'PAR':'IMPAR');
echo '<br>';
print_r($aleatorio3);

echo '<br>';
echo '<br>';

echo "EJERCICIO 10";
echo '<br>';
$i=rand(1,5);

switch ($i) {
    case '1':
      echo 'la variable "i" tomo el valor: 1';
    break;
    case '2':
      echo 'la variable "i" tomo el valor: 2';
    break;
    case '3':
      echo 'la variable "i" tomo el valor: 3';
    break;
    case '4':
      echo 'la variable "i" tomo el valor: 4';
    break;
    case '5':
      echo 'la variable "i" tomo el valor: 5';
    break;
  default:
    echo "SALIO OTRO NUMERO";
    break;
}
echo '<br>';
print_r($i);

echo '<br>';
echo '<br>';

echo "EJERCICIO 11";
echo '<br>';
switch ($i) {
    case '1':
      echo 'la variable "i" tomo el valor: 1';
    break;
    case '2':
      echo 'la variable "i" tomo el valor: 2';
    break;

  default:
    echo "SALIO un numero que no es ni 1 ni 2";
    break;
}
echo '<br>';
print_r($i);

echo '<br>';
echo '<br>';

echo "EJERCICIO 12";
echo '<br>';
$a=2;
$b=3;

if ($a<=>$b) {
  echo "HOLA";
}
echo '<br>';
print_r($a);



 ?>
