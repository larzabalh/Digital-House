<?php
$enviar_a = "misfinanzasDH@gmail.com";
$asunto = "Consulta - Mis Finanzas";
$errores=[];
//
if($_POST) {
  if (empty($_POST['name']) || preg_match('/[^A-Za-z0-9]/', $_POST['name'])) {
    $errores['name'] = 'Debe ingresar un nombre válido';
  }
  if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Debe ingresar un e-mail válido';
  }
  if (empty($_POST['comment'])) {
    $errores['comment'] = 'Por favor ingrese una consulta';
  } else {
    $mensaje = htmlspecialchars($_POST['comment']);
    $mensaje = trim($mensaje);
    $mensaje = stripslashes($mensaje);
  }
  $name = $_POST['name'];
  $from = $_POST['email'];
}

if (empty($errores)) {

  $mensaje_enviar = "De $name \n";
  $mensaje_enviar = "Correo: $from \n";
  $mensaje_enviar = 'Mensaje: '.$mensaje;

  mail($enviar_a, $asunto, $mensaje_enviar);
}



 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/contacto.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title>Contacto</title>
  </head>
  <body>
    <div class="container">
        <?php include('header/header.html') ?>
      <div class="contacto">
        <div class="form">
          <div class="backgroundColor">
            <h2>Envianos tus inquietudes</h2>
            <form class="contacto" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
              <label for="name">Tu Nombre</label>
              <input id="name" type="text" name="name" value="<?php if (empty($errores['name'])) {
                echo $name;
              } ?>">
              <br>
              <label for="email">Tu E-mail</label>
              <input id="email" type="text" name="email" value="<?php if (empty($errores['email'])) {
                echo $from;
              } ?>">
              <br>
            <label class="comment" for="comment">Comentario</label>
            <textarea name="comment" rows="8" cols="80"><?php if (empty($errores['comment'])) {
              echo $mensaje;
            } ?></textarea>
            <button type="submit" name="button">Enviar</button>
          </form>
          <?php
            if (!empty($errores)) {
              foreach ($errores as $key => $value) {
                echo $value.'<br>';
              }
            }
           ?>
          </div> <!-- .backgroundColor -->

        </div> <!-- .form -->
    </div> <!-- .container -->
      <?php include('footer/footer.html') ?>
  </body>
</html>
