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


$recurso= existe ("texto2.txt");

$archivo = "texto2.txt";
$escribo = "Hola mundo nuevamente Testing!!!\n";

fwrite ($recurso,$escribo);
// Le pongo al archivo 100 veces la frase!
// for ($i=1; $i <=100 ; $i++) {
// file_put_contents($archivo, $escribo,FILE_APPEND | LOCK_EX);
// }
//Asi leo todo el archivo!!!!
// $lectura = file_get_contents($archivo);
// echo $lectura;
echo "<br>";



//Lee linea por linea
      // $lectura = fopen($archivo, "r");
      // if ($lectura) {
      // while (($linea = fgets($lectura)) !== false) {
      // echo $linea."<br>";
      //   }
      // }
      // fclose($lectura);







 ?>
