<?php
      try {
        $db=new PDO($dsn,$db_user,$db_pass);

        $sql = "INSERT INTO actors (first_name,last_name) values ('$first_name', '$last_name')";
        $query= $db->prepare($sql);
        $query -> execute ();

      } catch (PDOException $e) {
        echo "El error de conexion es: ".$e -> getMessage();
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
         <?php foreach ($resultado as $key => $value) {?>
           <option value="<?php echo $key ?>"><?php echo $value['first_name']; ?></option>
         <?php } ?>
       </select>
     </div>

     <div class="">LAST NAME
       <select class="" name="actores">
         <?php foreach ($resultado as $key => $value) {?>
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
