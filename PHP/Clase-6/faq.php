<?php

$preguntas = array(
          'Color del Caballo Blanco de San Martin' =>"Blanco" ,
          'Mi segundo nombre' =>"Omar" ,
          'Nombre de mi mama' =>"Bety" ,
          'Color de mi perra' =>"Negro" ,
                  );

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <ul>
      <?php foreach ($preguntas as $key => $value) {?>
        <li> la pregunta es: <?php echo $key ?> y la respuesta es: <?php echo $value ?></li>
      <?php  }?>


    </ul>

  </body>
</html>
