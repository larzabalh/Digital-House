<?php
$titulo="Titulo PHP";
$descripcion="es​ ​ un​ ​ lenguaje​ ​ de​ ​ programación​ ​ de​ ​ uso​ ​ general​ ​ de​ ​ código​ ​ del​ ​ lado​ ​ del​ ​ servidor
originalmente​ ​ diseñado​ ​ para​ ​ el​ ​ desarrollo​ ​ web​ ​ de​ ​ contenido​ ​ dinámico.";
$textoPHP="PHP ";

$estilos='style="font-weight:BOLD"';


 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title><?php echo $titulo ?></title>
   </head>
   <body>
      <h1><?php echo $titulo ?></h1>
      <p><span <?php echo $estilos ?>><?php echo $textoPHP ?></span><?php echo $descripcion ?></p>




   </body>
 </html>
