<?php

function conexion(){
  $dsn = 'mysql:host=localhost;dbname=movies_db;charset=utf8mb4;port:3306';
  $db_user= 'root';
  $db_pass='root';
  try {
    $db=new PDO($dsn,$db_user,$db_pass);
  } catch (PDOException $e) {
    echo "El error de conexion es: ".$e -> getMessage();
  }
  return $db;
}

 ?>
