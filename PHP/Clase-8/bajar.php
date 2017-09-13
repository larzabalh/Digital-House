<pre>

<?php

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

echo "ARCHIVO SUBIDO CORRECTAMENTE!!!";
}
}

guardarImagen();

print_r ($_FILES["imgPerfil"]["error"]);
echo "<br>";
var_dump ($_FILES["imgPerfil"]["name"]);
echo "<br>";
var_dump ($_FILES["imgPerfil"]["tmp_name"]);
echo "<br>";

print_r ($_FILES);

 ?>
