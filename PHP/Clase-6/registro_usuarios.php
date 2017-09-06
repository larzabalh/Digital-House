<?php
var_dump($_POST);
if ($_POST) {
  $nombre = $_POST['nombre'];
  $mail = $_POST['mail'];
  $asunto = $_POST['ASUNTO'];
  $genero = (!empty($_POST['genero']))?$_POST['genero']:"";
  $pasatiempos = empty($_POST['pasatiempos'])?"":$_POST['pasatiempos'];
  $comentario = $_POST['comentario'];
}else {
  $nombre = "";
  $mail = "";
  $asunto = "";
  $genero = "";
  $pasatiempos = "";
  $comentario = "";
}
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../css/estilo.css">
     <link rel="stylesheet" href="../css/contacto.css">
     <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Indie+Flower|Sedgwick+Ave" rel="stylesheet">
     <title>CONTACTENOS</title>
   </head>
   <body class="contacto">
     <h1 align="center">FORMULARIO DE CONSULTAS</h1>



     <form class="" action="" method="post">

       <label class="campo"for="nombre">NOMBRE Y APELLIDO</label>
       <input type="text" id="nombre" name="nombre" value="<?php echo $nombre ;?>"  placeholder="Completar Nombre y Apellido...">
       <br><br>
       <label class="campo"for="mail">MAIL</label>
       <input type="email" id="mail" name="mail" value="<?php echo $mail ;?>" placeholder="Completar con el mail...">
       <br><br>
       <label class="campo"for="asunto">ASUNTO DEL MENSAJE</label>
       <select class=""id="asunto" name="ASUNTO">
         <option value="nada"></option>
         <option value="saludar">SALUDAR</option>
         <option value="comentar">COMENTAR</option>
         <option value="reclamar">RECLAMAR</option>
       </select>
       <br><br>
       <label class="campo"for="genero">GENERO</label><br>
       <input type="radio" id="genero" name="genero" value="masculino" selected>M
       <input type="radio" id="genero" name="genero" value="femenino">F
       <input type="radio" id="genero" name="genero" value="nada">NO RESPONDE

       <br><br>
       <label class="campo"for="pasatiempos">PASATIEMPOS</label>
       <input type="checkbox" id="pasatiempos" name="pasatiempos[]" value="fut">futbol
       <input type="checkbox" id="pasatiempos" name="pasatiempos[]" value="bas">basket
       <input type="checkbox" id="pasatiempos" name="pasatiempos[]" value="bjj">BJJ
       <input type="checkbox" id="pasatiempos" name="pasatiempos[]" value="hand">Handball
       <input type="checkbox" id="pasatiempos" name="pasatiempos[]" value="ten">Tenis
       <br><br>

       <label class="campo"for="comentario">COMENTARIOS</label>
       <textarea name="comentario"id="comentario" rows="8" cols="80"></textarea>
       <br><br>
       <button type="submit" name="">
         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDPn2I8pGVNZ8q1gpzxvc3lMEtSA-IbLVeb8wPadcTjH3v_n3g" alt="" width="40px">
       </button>

       <button type="reset" name="">BORRAR</button>

       <br><br>
     </form>



   </body>
 </html>
