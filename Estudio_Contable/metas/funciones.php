<?php
session_start();

function conexion(){
  $dsn = 'mysql:host=localhost;dbname=finanzas;charset=utf8mb4;port:3306';
  $conexion_user= 'root';
  $conexion_pass='';
  try {
    $conexion=new PDO($dsn,$conexion_user,$conexion_pass);
  } catch (PDOException $e) {
    echo "El error de conexion es: ".$e -> getMessage();
  }
  return $conexion;
}

function dropdown($tabla){
  $conexion = conexion();
  $sql = "SELECT * FROM $tabla";
  $query2= $conexion->prepare($sql);
  $query2->execute();
  $resultados = $query2->fetchAll(PDO::FETCH_ASSOC);
  return $resultados;
}

function insertar_banco($banco,$usuario=1){
  $conexion = conexion();
  try {
    $sql = "INSERT INTO bancos (banco_nombre,usuario_id) values ('$banco', '$usuario')";
    $query= $conexion->prepare($sql);
    $query -> execute ();

  } catch (Exception $e) {
    echo "Hay un error: ".$e -> getMessage();
  }
}

function insertar_cuenta($banco,$cuenta,$usuario=1){
  $conexion = conexion();
  try {
    $sql = "INSERT INTO cuentas_bancaria (banco_id,num_cuenta,usuario_id) values ('$banco','$cuenta', '$usuario')";
    var_dump($sql);
    $query= $conexion->prepare($sql);
    $query -> execute ();
    $salida ='ok';
  } catch (Exception $e) {
    $salida =$e -> getMessage();
  }
  return $salida;
}

function banco_cuenta(){
  $conexion = conexion();
  $sql = "SELECT banco_nombre AS BANCO,num_cuenta AS CUENTA_BANCARIA
          FROM cuentas_bancaria
          JOIN bancos ON banco_id = bancos.idbancos";
  $query2= $conexion->prepare($sql);
  $query2->execute();
  $resultados = $query2->fetchAll(PDO::FETCH_ASSOC);
  return $resultados;
}
