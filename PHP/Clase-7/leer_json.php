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
//echo $lectura;
//echo "<br>";
//var_dump ($lectura);
//echo "<br>";


$b = json_decode ($lectura,true);
//echo "<br>";
//var_dump ($b);

$categorias = $b['categorias'];
var_dump($categorias);

 // foreach ($categorias as $value) {
 //       echo "cat: ".$value['id']." valor: ".$value['nombre']."<br>";
 //  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>ESTOS SON LOS CHECKS</h1>

<?php foreach ($categorias as $value) { ?>
    <label for=""><?php echo $value['nombre'];?></label>
    <input type="checkbox" name=<?php echo $value['id']; ?> value="">

<?php } ?>
  </body>
</html>
