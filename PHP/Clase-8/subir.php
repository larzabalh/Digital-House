<?php
// Crear​ ​ dos​ ​ archivos​ ​ llamados​ ​ subir.php​​ ​ y ​ ​ bajar.php
// a. subir.php​​ ​ debe​ ​ tener​ ​ un​ ​ botón​ ​ que​ ​ permite​ ​ subir​ ​ un​ ​ archivo​ ​ al​ ​ servidor​ ​ por
// metodo​ ​ post​​ ​ y ​ ​ guardarlo​ ​ en​ ​ un​ ​ directorio​ ​ llamado​ ​ “ ​ subidos​ ”.​ ​ En​ ​ el​ ​ caso​ ​ que
// ya​ ​ exista​ ​ un​ ​ archivo​ ​ con​ ​ el​ ​ mismo​ ​ nombre​ ​ en​ ​ el​ ​ directorio,​ ​ avisarle​ ​ al​ ​ usuario.
// b. bajar.php​​ ​ debe​ ​ mostrar​ ​ un​ ​ link​ ​ de​ ​ descarga​ ​ del​ ​ archivo​ ​ subi

function guardarImagen() {
if ($_FILES["imgPerfil"]["error"] == UPLOAD_ERR_OK)
{
$nombre=$_FILES["imgPerfil"]["name"];
$archivo=$_FILES["imgPerfil"]["tmp_name"];
$ext = pathinfo($nombre, PATHINFO_EXTENSION);
$miArchivo = dirname(__FILE__);
$miArchivo = $miArchivo . "/img/";
$miArchivo = $miArchivo . "imagenNueva." . $ext;
move_uploaded_file($archivo, $miArchivo);
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

    <form class="" action="bajar.php" method="post" enctype="multipart/form-data">
      <input type="hidden"name="MAX_FILE_SIZE" value="3000000">
      <input type="file" name="imgPerfil" value="">
      <input type="submit" name="enviar" value="enviar">


    </form>
  </body>
</html>
