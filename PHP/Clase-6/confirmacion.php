<?php

$nombre = $_GET['nombre'] ?? null;
$mail = $_GET['mail'] ?? null;
$asunto = $_GET['ASUNTO'] ?? null;
$genero = $_GET['genero'] ?? null;
$pasatiempos = $_GET['pasatiempos'] ?? null;
$comentario = $_GET['comentario'] ?? null;

$nombre = $_POST['nombre'] ?? null;
$mail = $_POST['mail'] ?? null;
$asunto = $_POST['ASUNTO'] ?? null;
$genero = $_POST['genero'] ?? null;
$pasatiempos = $_POST['pasatiempos'] ?? null;
$comentario = $_POST['comentario'] ?? null;



echo "el nombre es: $nombre.<br>";
echo "el mail es: $mail.<br>";
echo "el asunto del mail es: $asunto.<br>";
echo "el genero es: $genero.<br>";
// e cho "el pasatiempo preferido es: $pasatiempos.<br>";
 //"el pasatiempo preferido es: $pasatiempos.<br>";
echo "el comentario que hizo es: $comentario.<br>";

foreach ($pasatiempos as $key => $value) {
  echo "su pasatiempos son: $value.<br>";

}

 ?>
