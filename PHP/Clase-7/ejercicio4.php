<?php


function frase(){

$clave ="miclave";
echo "$clave"."<br>";

$encriptar_md5 = md5($clave);
echo "esto es encriptado en md5".$encriptar_md5."<br>";

$encriptar_sha1 = sha1($clave);
echo "esto es incriptado en SHA1 ".$encriptar_sha1."<br>";

$hash1 = password_hash($clave, PASSWORD_DEFAULT);
echo "esto es incriptado en SHA1 Password Has".$hash1."<br>";

$hash1 = password_hash($clave, PASSWORD_BCRYPT);
echo "esto es incriptado en SHA1 Password Has".$hash1."<br>";

$hash1 = password_hash($clave, PASSWORD_BCRYPT,salt);
echo "esto es incriptado en SHA1 Password Has".$hash1."<br>";



}

frase();


 ?>
