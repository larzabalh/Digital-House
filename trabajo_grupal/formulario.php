<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/formulario.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title>Registrate</title>
  </head>
  <body>

    <div class="container">
      <div class="header">
      <?php include('header/header.html') ?>
      <div class="formularios">
        <article class="forms">
          <div class="signUp">
            <br><br>
            <h1> Sign Up </h1>
            <br>
            <div class="redes">
              <a class="google" href="http://google.com" target="new" id="google">  <img src="images/google-plus.png" alt="" width="35px"> Google </a>
              <a class="facebook" href="http://facebook.com" target="new" id="facebook"><img src="images/facebook.png" alt="" width="35px"> Facebook </a>
              <a class="twitter" href="http://twitter.com" target="new" id="twitter"><img src="images/twitter.png" alt="" width="35px"> Twitter </a>
            </div>
            <br>

            <form action="tablero.html" method="POST">
              <label for="nombre">Nombre:</label>
              <input id="nombre" type="text" name="nombre1" value="" required>
              <br><br>
              <label for="apellido">Apellido:</label>
              <input id="apellido" type="text" name="apellido2" placeholder="" required>

              <br><br>
              <label for="password">Contraseña</label>
              <input type="password" name="password" id="password" value="" required>

              <br><br>

              <label for="email">E-mail</label>
              <input type="email" name="email" id="email" value="" required>
              <br><br>
              <label for="username">Username</label>
              <input type="username" name="username" id="username" value="" required>

              <br><br>

              Sexo:
              <input type="radio" name="sexo" value="M">M
              <input type="radio" name="sexo" value="F">F

              <br><br>

              <input type="hidden" name="" value="">

              <button class="button" type="submit">
                Enviar
              </button>
            </div>


            <div class="logIn">
              <br><br>
              <h1> Log In </h1>
              <br><br>
              <form action="tablero.html" method="POST">
                <label for="username">Username</label>
                <input type="username" name="username" id="username" value="" required>


                <br><br>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" value="" required>

                <input type="hidden" name="" value="">
                <br><br>
                <button class="button" type="submit">
                  Enviar
                </button>
              </div>
            </article>
      </div> <!-- .formularios -->
    </div> <!-- .container -->
    <footer class="footerIndex">
      <img class="margin-bottom" src="images/logo200px.png" alt="" width="200px">
      <p class="margin-bottom"><a href="#">Terminos & Condiciones</a> <a href="#">Póliza de Privacidad</a><a href="#">Copyrights</a></p>
      </div>
      <p class="copyright">Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
    </footer>
  </body>
</html>
