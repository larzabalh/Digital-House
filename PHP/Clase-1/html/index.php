<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Indie+Flower|Sedgwick+Ave" rel="stylesheet">
    <title>MI canvas</title>
  </head>
  <body id="arriba">
    <?php
    $nombre ="HERNAN LARZABAL";
    $perfil ="Mi profesion la realizo orientada al servicio de mis clientes.";
    $CV_de =[];

    $CV_de["nombre"]="OMAR";

    $array = array(
         "a",
         "b",
    6 => "c",
         "d",
            );
var_dump($array);
    



     ?>

    <h1 align="center">CV <?php echo $nombre ?></h1>
    <h1 align="center"><img src="../imagen/hernan.jpg" alt="" width="200"></h1>
<a href="#video">VER EL VIDEO</a>

<h2 class="titulos">PERFIL</h2>
<p><?php echo $perfil ?></p>

<h2 class="titulos">DATOS PERSONALES</h2>
    <ul class="datos contenidos">
      <li>Nombre y Apellido:<p>HERNAN LARZABAL</p></li>
      <li>Nacionalidad: <p>ARGENTINA</p></li>
      <li><p>Direccion:<p><p>Ventura Bosch 6725</p></li>
      <li>Telefono:<a href="46412924"></a><p>4641-2924</p></li>
      <li>Mail:<p><a href="mailto:larzabalh@hotmail.com?subject=ASUNTO">larzabalh@hotmail.com</a></p></li>
      <li>Fecha de Nacimiento:<p>30/12/1980</p></li>
    </ul>

<h2 class="titulos">ESTUDIOS UNIVERSITARIOS COMPLETOS</h2>
  <ul class="universitario contenidos">
    <li>CONTADOR PUBLICO</li>
    <li>PROFESOR DE CIENCIAS ECONOMICAS</li>
  </ul>

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
