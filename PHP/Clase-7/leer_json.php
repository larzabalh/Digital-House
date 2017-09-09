<pre>

<?php

function existe ($archivo){

if (file_exists($archivo)){
  $recurso=fopen ($archivo,'a+');
  }
  else {
  $recurso=fopen ($archivo,'a+');
  }
  return $recurso;
}


$recurso= existe ("categorias.json");
$archivo = "categorias.json";
//$escribo = "Hola mundo nuevamente Testing!!!\n";



//Asi leo todo el archivo!!!!
$lectura = file_get_contents($archivo);
echo $lectura;
echo "<br>";
var_dump ($lectura);
echo "<br>";


$b = json_decode ($lectura,true);
echo "<br>";
var_dump ($b);

foreach ($b as $key) {
  if (is_array ($key)) {
     foreach ($key as $value) {
       if (is_array ($value)) {
         foreach ($value as $indice => $clave) {
           echo "esto es $clave"."<br>";
         }
        }
     }
  }
}
var_dump($indice);
var_dump($clave);
?>
