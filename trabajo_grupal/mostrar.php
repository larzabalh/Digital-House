<?php
require_once('funciones.php');

$db= conexion();

$sql = "SELECT * FROM usuarios";
$query= $db->prepare($sql);
$query->execute();
$resultados = $query->fetchAll(PDO::FETCH_ASSOC);



 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>


     <div class="">EMAIL
       <select class="" name="actores">
         <?php foreach ($resultados as $key => $value) {?>
           <option value="<?php echo $key ?>"><?php echo $value['email']; ?></option>
         <?php } ?>
       </select>
     </div>

     <div class="">NOMBRE
       <select class="" name="actores">
         <?php foreach ($resultados as $key => $value) {?>
           <option value="<?php echo $key ?>"><?php echo $value['nombre']; ?></option>
         <?php } ?>
       </select>
     </div>


   </body>
 </html>

 <?php
 //Asi cierro la conexion con la base de datos.
 $db=null;
?>
