<?php

session_start();


var_dump($_SESSION);
echo "<br>";


if(isset($_POST['reiniciar'])){

  $_SESSION['contador']=0;

  echo $_SESSION['contador'];
}
if (isset($_POST['incrementar'])) {
  $_SESSION["contador"]+=1;

echo $_SESSION["contador"];
}



 ?>
