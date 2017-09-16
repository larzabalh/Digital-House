<?php

session_start();

if (!$_SESSION['usuario']){
header('Location: login.php');

}

echo "HOLA". " ".$_SESSION['nombre'];
echo "<br>";
echo "con el email:". " ".$_SESSION['email'];
echo "<br>";
echo "Con el usuario". " ".$_SESSION['usuario'];
echo "<br>";
echo "con la clave:". " ".$_SESSION['clave2'];
echo "<br>";
echo "con la edad:". " ".$_SESSION['edad'];
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
