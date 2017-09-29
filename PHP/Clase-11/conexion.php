<?php
//Todo esto es la conexion a la base de datos. EL port 3306 es el que se usa por default!!
require 'funciones.php';
$db= conexion();

$sql = "SELECT * FROM actors";
$query2= $db->prepare($sql);
$query2->execute();
$resultados = $query2->fetchAll(PDO::FETCH_ASSOC);


$first_name= isset ($_POST['first_name'])? $_POST['first_name'] : null;
$last_name= isset ($_POST['last_name'])? $_POST['last_name'] : null;

$errores= array();

if ($_POST) {


    if (count($errores)==0){
      try {

        $sql = "INSERT INTO actors (first_name,last_name) values ('$first_name', '$last_name')";
        $query= $db->prepare($sql);
        $query -> execute ();

      } catch (Exception $e) {
        echo "Hay un error: ".$e -> getMessage();
      }

    }

}


?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>


     <div class="">FIRST NAME
       <select class="" name="actores">
         <?php foreach ($resultados as $key => $value) {?>
           <option value="<?php echo $key ?>"><?php echo $value['first_name']; ?></option>
         <?php } ?>
       </select>
     </div>

     <div class="">LAST NAME
       <select class="" name="actores">
         <?php foreach ($resultados as $key => $value) {?>
           <option value="<?php echo $key ?>"><?php echo $value['last_name']; ?></option>
         <?php } ?>
       </select>
     </div>

<form class="" action="conexion.php" method="post">
  <label for="first_name">NOMBRE</label>
  <input type="text" name="first_name" value="">

  <label for="last_name">APELLIDO</label>
  <input type="text" name="last_name" value="">

  <input type="submit" name="enviar" value="ENVIAR">


</form>


   </body>
 </html>

 <?php
 //Asi cierro la conexion con la base de datos.
 $db=null;
?>
