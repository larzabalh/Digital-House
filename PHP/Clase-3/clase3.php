<?php

echo "Ejercicio 1" .'<br/>';
$aleatorio =rand(1,10);
echo "<br/>";
var_dump($aleatorio);
echo "<br/>";


for ($i=0; $i <= 10; $i++) {

      if ($aleatorio==$i) {
        echo "El Numero $aleatorio freno la iteracion".'<br/>';
        break;
    }

  echo "Numero $i".'<br/>';
}

echo "<br/>";
echo "Ejercicio 3" .'<br/>';

$dos=2;
for ($i=0; $i < 20; $i++) {
  echo "El numero $i X 2 es=".$dos*$i.'<br/>';
}

echo "<br/>";
echo "Ejercicio 4" .'<br/>';

$contador=0;
$moneda=0;
while ($moneda<5) {
$tiro=rand(0,1);
$contador=$contador+1;
echo "Tiro la moneda y sale $tiro".'<br/>';
    if ($tiro==1) {
      $moneda++;
      echo "Salio un 1 y lo cuento.".'<br/>';
    }else {
      $moneda=0;
    }

}
echo "Para que salgan 5 unos seguidos se tardo $contador";
echo "<br/>";
echo "<br/>";


echo "Ejercicio 5" .'<br/>';

$contador2=0;
do{
  $moneda2= rand(0,1);
  echo "Tire y salio $moneda2".'<br/>';
  $contador2=$contador2+1;

    if ($moneda2==1) {
      echo "Salio el numero 1".'<br/>';;
      echo "Tuve que tirar $contador2 la moneda para que salga 1";
      }

}while ($moneda2 == 0);

echo "<br/>";
echo "<br/>";


echo "Ejercicio 7" .'<br/>';
$nombres=['hernan','adolfo','martin','francisco','pablo'];

echo "Imprimo con un FOR".'</br>';
for ($i=0; $i < count($nombres); $i++) {
  echo "$nombres[$i]".'<br/>';
}
echo "<br/>";
echo "Imprimo con un WHILE".'</br>';
$i=0;
while ($i<count($nombres)) {
  echo "$nombres[$i]".'<br/>';
  $i++;
}
echo "<br/>";
echo "Imprimo con un DO WHILE".'</br>';
$i=0;
do {
  echo "$nombres[$i]".'</br>';
  $i++;
} while ($i < count($nombres));

echo "<br/>";
echo "<br/>";
echo "Ejercicio 8" .'<br/>';
foreach (range('a', 'o') as $letras) {
    $array[]=$letras;
}
for ($i=0; $i <count($array) ; $i++) {
  echo "El indice $i contiene la letra $array[$i] </br>";

}
print_r($array);

echo "<br/>";
echo "<br/>";
echo "Ejercicio 9" .'<br/>';
$mascota=[
          'animal'=>"PERRO",
          'edad'=>20,
          'altura'=>12.99,
          'nombre'=>"china",
        ];

foreach ($mascota as $index => $value) {
  echo "El $index es un $value </br>";
  }

echo "<br/>";
echo "<br/>";
echo "Ejercicio 10" .'<br/>';
$ceu​ ​ = ​ ​ array(​ ​ "Italia"=>"Roma",​ ​ "Luxembourg"=>"Luxembourg",​ ​ "Bélgica"=>​ ​ "Bruselas",
"Dinamarca"=>"Copenhagen",​ ​ "Finlandia"=>"Helsinki",​ ​ "Francia"​ ​ =>​ ​ "Paris",
"Slovakia"=>"Bratislava",​ ​ "Eslovenia"=>"Ljubljana",​ ​ "Alemania"​ ​ =>​ ​ "Berlin",​ ​ "Grecia"​ ​ =>​ ​ "Athenas",
"Irlanda"=>"Dublin",​ ​ "Holanda"=>"Amsterdam",​ ​ "Portugal"=>"Lisbon",​ ​ "España"=>"Madrid",
"Suecia"=>"Stockholm",​ ​ "Reino​ ​ Unido"=>"London",​ ​ "Chipre"=>"Nicosia",​ ​ "Lithuania"=>"Vilnius",
"Republica​ ​ Checa"=>"Prague",​ ​ "Estonia"=>"Tallin",​ ​ "Hungría"=>"Budapest",​ ​ "Latvia"=>"Riga",
"Malta"=>"Valletta",​ ​ "Austria"​ ​ =>​ ​ "Vienna",​ ​ "Polonia"=>"Warsaw")​ ​ ;

foreach ($ceu as $key => $value) {
  echo "El pais $key tiene la capital $value </br>";
}




 ?>
