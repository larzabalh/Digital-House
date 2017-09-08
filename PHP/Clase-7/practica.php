<pre>

<?php
$a= array(
  'a' =>1 ,
  'b' =>2 ,
  'c' =>"YO <3 JSON" ,
          );

// echo "$a"; no lo puedo imprimir porque me da un error imprimir un array.

// $a= json_encode ($a);
//
// echo "$a";
// echo "<br>";
// var_dump ($a);

$b =json_encode ($a);
echo "$b";
echo "<br>";

$b=json_decode ($b, true);
echo "<br>";

var_dump ($b);
echo "<br>";

echo $b["c"]."|".$b["a"]."|".$b["b"] ;


 ?>
