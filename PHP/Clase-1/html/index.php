<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Indie+Flower|Sedgwick+Ave" rel="stylesheet">
    <title>MI canvas</title>
  </head>
  <body id="arriba">
<pre>
    <?php


    $nombre ="HERNAN LARZABAL";
    $perfil ="Mi profesion la realizo orientada al servicio de mis clientes.";
    $CV_de =[];

    $CV_de["nombre"]="OMAR";


//     $array = array(
//       0=>"a",
//       1=>"b",
//       2=> "c",
//       3=>"d",
//             );
// var_dump($array);

// $array=[];
// $array[0]=1;
// $array[1]=2;
// $array[2]=3;
// var_dump($array);

$datos = array(
'nombre' => "HERNAN",
'apellido'=>"LARZABAL",
'edad'=>36,
'ocupacion'=>"CONTADOR",
'pais'=>"ARGENTINA",
'direccion'=>"ventura Bosch 6725",
'telefono'=>"4641-2924",
'nacimiento'=>"30/12/1980",
'mail'=>"larzabalh@hotmail.com",
);
// var_dump($datos);

$estudios = array('CONTADOR', 'PROFESOR DE CIENCIAS ECONOMICAS', 'PROFE DE INGLES', 'ADMINISTRACION DE EMPRESAS');
var_dump(estudios);

$colors = array('rojo', 'azul', 'verde', 'amarillo');

     ?>
</pre>
    <h1 align="center">CV <?php echo $nombre ?></h1>
    <h1 align="center"><img src="../imagen/hernan.jpg" alt="" width="200"></h1>
<a href="#video">VER EL VIDEO</a>

<h2 class="titulos">PERFIL</h2>
<p><?php echo $perfil ?></p>

<h2 class="titulos">DATOS PERSONALES</h2>
    <ul class="datos contenidos">
      <li>Nombre y Apellido: <?php echo $datos["nombre"]." ".$datos["apellido"]   ?></li>
      <li>Nacionalidad: <?php echo $datos["pais"]?> </li>
      <li>Direccion:<?php echo $datos["direccion"] ?> </li>
      <li>Telefono:<a href="46412924"></a><?php echo $datos["telefono"] ?> </li>
      <li>Mail:<a href="mailto:larzabalh@hotmail.com?subject=ASUNTO"><?php echo $datos["mail"] ?></a></li>
      <li>Fecha de Nacimiento: <?php echo $datos["nacimiento"] ?></li>
    </ul>

<h2 class="titulos">ESTUDIOS UNIVERSITARIOS COMPLETOS</h2>
  <ul class="universitario contenidos">
    <li><?php echo $estudios[0] ?></li>
    <li>PROFESOR DE CIENCIAS ECONOMICAS</li>
  </ul>

  <?php
  //
  // foreach ($estudios as estudio) {
  //   echo "Le gusta la profesion de $estudio";
  // }

   ?>

   <?php


   foreach ($estudios as $estudio) {
       echo "¿Le gusta el $estudio? <br>";
   }
?>


<h2 class="titulos">IDIOMAS</h2>
  <ul class="idioma contenidos">
    <li>INGLES:<p>Nivel Medio</p></li>
    <li>Portugues:<p>Nivel Medio</p></li>
  </ul>

<h2 class="titulos">INFORMATICA</h2>
  <ul class="informatica contenidos">
    <li>MANEJO DE PAQUETE OFFICE</li>
    <li>MANEJO DE BASE DE DATOS</li>
    <li>SE MANDAR MAILS</li>
  </ul>

  <h2 class="titulos">HOBBIES</h2>
    <ul class="hobbies contenidos">
      <li>FUTBOL</li>
      <li>BASKET</li>
      <li>BJJ</li>
      <li>HANDBALL</li>
    </ul>

    <h2 class="titulos">REDES SOCIALES</h2>
    <ul class="redes contenidos">
      <li>FACEBOOK <a href="http://facebook.com.ar" target="_blank"><img src="https://cdn2.iconfinder.com/data/icons/social-18/512/Facebook-2-128.png" alt="" width="20"></a></li>
      <li>YOUTUBE <a href="http://youtube.com.ar" target="_blank"><img src="https://cdn2.iconfinder.com/data/icons/funky/64/Youtube-2-128.png" alt="" width="20"></a></li>
      <li>INSTAGRAM <a href="http://instagram.com.ar" target="_blank"><img src="https://cdn2.iconfinder.com/data/icons/instagram-classic/512/instagram-round-flat-128.png" alt=""width="20"></a></li>
      <li>TWITTER <a href="http://twitter.com.ar" target="_blank"><img src="https://cdn1.iconfinder.com/data/icons/social-vol-2-1/200/14-128.png" alt="" width="30"></a></li>
    </ul>

    <br>

    <h2>MI HISTORIA EN UN VIDEO</h2>
    <p  id="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/B0H4jMpUSjo" frameborder="0" allowfullscreen></iframe></p>

    <br>
    <p><a href="#arriba">SUBIR</a></p>
  </body>
</html>
