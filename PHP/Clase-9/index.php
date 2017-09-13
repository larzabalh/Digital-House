<?php
session_start();



if (isset($_POST['color'])) {
$_SESSION['color']=$_POST['color'];
var_dump ($_SESSION['color']);
echo "<br>";
var_dump ($_POST['color']);
}

include 'index.view.php';

 ?>


     <form class="" action="index.php" method="post">
       <select class="" name="color">
         <option value="red">red</option>
         <option value="blue">blue</option>
         <option value="yellow">yellow</option>
         <option value="green">green</option>
       </select>
       <input type="submit" name="enviar" value="enviar">
     </form>

<?php include 'view.footer.php' ?>
