<pre>

<?php echo $entero = 53 ?>
<br>
<?php echo $decimal =53.53 ?>
<br>
<?php echo $caracter = "%caracter$%" ?>
<br>
<?php echo $comilla_simple='%"%&caractere' ?>
<br>
<?php echo $cadena = "Esto es una cadena" ?>
<br>
<?php echo $entero = "pise la variable" ?>
<br>
<?php echo $comilla_simple=53.99 ?>
<br>
<?php echo $entero = '54' ?>
<br>
<?php echo $uno = 'Tres' ?>
<br>
<?php echo $dos = 'Tristes' ?>
<br>
<?php echo $tres = 'Tigres' ?>
<br>
<?php echo $cuatro = 'Tragan' ?>
<br>
<?php echo $cinco = 'Trigo' ?>
<br>
<?php echo $seis = 'en' ?>
<br>
<?php echo $siete = 'el' ?>
<br>
<?php echo $ocho = 'Trigal' ?>
<br>
<?php
echo $uno." ".$dos." ".$tres." ".$cuatro." ".$cinco." ".$seis." ".$siete." ".$ocho;

echo "<br>";

$toda_la_frase = $uno." ".$dos." ".$tres." ".$cuatro." ".$cinco." ".$seis." ".$siete." ".$ocho;

echo "Esto es una variable="." ".$toda_la_frase;
echo "<br>";
echo '$toda_la_frase';
echo "<br>";
echo "Esto es una variabale= $toda_la_frase";
echo "<br>";
var_dump($toda_la_frase);
echo "<br>";

// NOTE: esto se usa para eliminar una variable!!! unset ($cinco);
echo "$cinco";

echo "<br>";
var_dump($toda_la_frase);
echo "<br>";


$variable01 = true;
$variable02 = false;
$variable03 = 0;
$variable04 = 1;
$variable05 = 6;
$variable06 = '';
$variable07 = "3";
$variable08 = "true";
$variable09 ='false';
$variable10 = null;

echo "<br>";
function tipoDato($varN)
{
      if ( $varN == true )
      {
          echo 'el valor ' . $varN . ' es verdadero.';
      }
      else
      {
        echo 'el valor ' . $varN . ' es falso.';
      }
}
echo "<br>";
 tipoDato($variable01);

echo "<br>";
 $animales = ["perro","gato","conejo"];
 $animales[]="gallina";

// $animales = [
//   0 => "perro";
//   1 => "conejo"
// ]

$animales[]="oso";


echo "<br>";
echo $animales[2];
echo "<br>";
echo "<br>";

print_r($animales);

echo "<br>";
echo "<br>";
$miArray = [];
$miArray["nombre"] = 'Hernan';
$miArray["apellido"] = 'Larzabal';
$miArray["edad"]= 36;

var_dump($miArray);


echo "<br>";
echo "<br>";
$miArray2 = [];
$miArray2["nombre"] = 'Hernan';
$miArray2["apellido"] = 'Larzabal';
$miArray2["edad"]= 36;

var_dump($miArray2);

?>







</pre>
