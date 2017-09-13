<?php


$pass ="";
$nombre = "";

if($_POST) {
  $errores = validar($_POST);
  if(empty($errores["nombreIndex"])){
    $nombre = $_POST["nombreIndex"];
  }
  if(empty($errores["password"])){
    $pass = $_POST["password"];
  }

}


function validar($valido){
  $errores = [];
  $nombre = $valido["nombreIndex"];
  if($nombre == ""){
    $errores["nombreIndex"] = "Completa nombre";
  }
  $pass = $valido["password"];
  if($pass == ""){
    $errores["password"] = "Completa el mail";
  }

  return $errores;
}


 ?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title>Mis Finanzas - Argentina</title>
  </head>
  <body>
    <div class="container">
      <div class="background1">
        <div class="header">
          <header class="index">

            <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <a href="index.html"><img class="logo" src="images/logo200px.png" alt="" width="250px"></a>
            <nav class="menu">
              <ul>
                <li class="hvr-underline-from-center"><a href="contacto.html">Contacto</a></li>
                <li class="hvr-underline-from-center"><a href="formulario.html">Registrate</a></li>
                <li class="hvr-underline-from-center"><a href="faqs.html">FAQs</a></li>
              </ul>
            </nav>
            <nav class="menu-movil">
              <ul>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="formulario.html">Registrate</a></li>
                <li><a href="faqs.html">FAQs</a></li>
              </ul>
            </nav>

          </header>
        </div> <!-- .header -->
      </div>
      <section class="section1">
        <div>
          <h2 class="bounceInLeft animated">Administra tus finanzas</h2>
          <h3><spam class="animation1 bounceInLeft animated">Fácil. </spam><spam class="bounceInLeft animated animation2">Rápido.</spam><spam class="bounceInLeft animated animation3"> Gratis.</spam></h3>
          <a href="#queSomos" class="hvr-grow fadeInUp animated saberMas">Saber Más ↓</a>
        </div>
        <div class="formularioIndex fadeInDown animated">
          <p>Inicia Sesion</p>
          <form class="logIn" action="registro.php" method="post">
            <div>
              <label for="nombreIndex">Nombre de Usuario</label>
              <br>
              <input id="nombreIndex" type="text" name="nombreIndex" value="<?php echo $nombre ?>" >
              <br>

              <label for="password">Contraseña</label>
              <br>
              <input id="password" type="password" name="password" value="<?php echo $pass ?>" >
            </div>

            <div class="errores">
              <?php
              if(!empty($errores["nombreIndex"])){
                echo $errores["nombreIndex"]."<br>";
              }
              ?>

              <?php
              if(!empty($errores["password"])){
                echo $errores["password"];
              }
              ?>

            </div>
            <input id="recordarme" type="checkbox" name="recordarme" value="yes">
            <label for="recordarme">Recordarme</label>
            <br>
            <button type="submit" name="button">Iniciar</button>
            <br>
            <a href="#">¿Has olvidado tu contraseña?</a>
            <br>
            <a href="#">¿No estás registrado? Crea tu cuenta.</a>
          </form>
        </div>

      </section>
    </div>
    <section id="queSomos" class="indexParte2">
      <div>
        <h2>¿Quiénes somos?</h2>
        <br>
        <p>Somos un grupo de contadores especializados con las herramientas</p>
        <p>para brindarte la solucion a tus problemas financieros</p>
      </div>
    </section>
    <section class="indexParte3">
      <div>
        <h2>Beneficios</h2>
        <ul>
          <li><img src="images/stopwatch.svg" alt="" width="60px"><span>ACCESIBILIDAD</span>  Disponibilidad del servicio las 24 horas</li>
          <li><img src="images/teamwork.svg" alt="" width="60px"><span>ASISTENCIA</span>  Contacto con personas dedicadas al rubro</li>
          <li><img src="images/group.svg" alt="" width="60px"><span>ATENCIÓN</span>  Soporte técnico por expertos</li>
        </ul>
      </div>
    </section>
    <footer class="footerIndex">
      <img class="margin-bottom" src="images/logo200px.png" alt="" width="200px">
      <p class="margin-bottom"><a href="#">Terminos & Condiciones</a> <a href="#">Póliza de Privacidad</a><a href="#">Copyrights</a></p>
      </div>
      <p class="copyright">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
    </footer>

  </body>
</html>
