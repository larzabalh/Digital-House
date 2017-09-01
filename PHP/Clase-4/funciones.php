<?php
$numeroMagico =rand(0,1);
echo "El numero MAgico es: $numeroMagico";

echo "<br/>";
echo "<br/>";
echo "Ejercicio 1-A" .'<br/>';

function mayor ($uno,$dos,$tres=''){
    if ($tres=='') {
      global $numeroMagico;
    $tres=$numeroMagico;
    }

    if ($uno>$dos && $uno >$tres) {
      echo "EL numero $uno es el mayor";
      }elseif ($dos >$uno && $dos >$tres) {
        echo "EL numero $dos es el mayor";
        }elseif ($tres>$uno && $tres>$dos) {
        echo "EL numero $tres es el mayor";
    }
}

echo mayor (1,10);

echo "<br/>";
echo "<br/>";
echo "Ejercicio 1-B" .'<br/>';

function tabla($maximo,$minimo=""){
if ($minimo=="") {
  global $numeroMagico;
  $minimo=$numeroMagico;
}
$tabla = [];
for ($i=$minimo; $i <=$maximo ; $i++) {
  $tabla[]=$i;
}

return $tabla;
}

var_dump(tabla(10));

echo "<br/>";
echo "<br/>";
echo "Ejercicio 1-C" .'<br/>';




 ?>
