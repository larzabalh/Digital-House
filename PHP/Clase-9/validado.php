<?php
session_start();

echo "HOLA". " ".$_SESSION['usuario'];

echo "<br>";
echo "con el email:". " ".$_SESSION['email'];

echo "<br>";
echo "con la clave:". " ".$_SESSION['clave2'];


echo "<br>";

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <a href="register.php">REGISTRO</a>
    <a href="login.php">LOGIN</a>
  </body>
</html>
