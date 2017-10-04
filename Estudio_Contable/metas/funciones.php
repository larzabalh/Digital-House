<?php
session_start();

function conexion(){
  $dsn = 'mysql:host=localhost;dbname=finanzas;charset=utf8mb4;port:3306';
  $conexion_user= 'root';
  $conexion_pass='root';
  try {
    $conexion=new PDO($dsn,$conexion_user,$conexion_pass);
  } catch (PDOException $e) {
    echo "El error de conexion es: ".$e -> getMessage();
  }
  return $conexion;
}
function formato_moneda($importe){
$resultado= "$".number_format($importe,2,',','.');
return $resultado;
}


function tabla($tabla){
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

function insertar_chequera($numero_chequera,$cantidad_cheques,$desde,$hasta,$cuenta,$usuario=1){
  $conexion = conexion();
  try {
    $sql = "INSERT INTO chequera (numero_chequera,cantidad_cheques,desde,hasta,cuenta_bancaria_id,usuario_id)
    values ($numero_chequera,$cantidad_cheques,$desde,$hasta,$cuenta,$usuario)";
    $query= $conexion->prepare($sql);
    $query -> execute ();
    $salida ='ok';
  } catch (Exception $e) {
    $salida =$e -> getMessage();
  }
  return $salida;
}

function datos_chequera(){
  $conexion = conexion();
  $sql = "SELECT banco_nombre AS BANCO,num_cuenta AS CUENTA_BANCARIA, numero_chequera AS CHEQUERA_NUMERO, cantidad_cheques AS CANT_CH, desde AS DESDE, hasta AS HASTA
FROM chequera
JOIN cuentas_bancaria ON cuenta_bancaria_id = idcuentas_bancaria
JOIN bancos ON banco_id = bancos.idbancos";
  $query2= $conexion->prepare($sql);
  $query2->execute();
  $resultados = $query2->fetchAll(PDO::FETCH_ASSOC);
  return $resultados;
}

function insertar_movimientos_bancarios($movimiento){
  $conexion = conexion();
  try {
    $sql = "INSERT INTO movimientos (movimientos_nombre) values ('$movimiento')";
    $query= $conexion->prepare($sql);
    $query -> execute ();

  } catch (Exception $e) {
    echo "Hay un error: ".$e -> getMessage();
  }
}

function insertar_tarjeta($nombre_tarjeta,$dia_del_debito,$medio_de_pago_id,$limite,$cuenta_bancaria_id,$movimiento_bancario_id,$usuario_tarjeta_id,$usuario=1){
  $conexion = conexion();
  try {
    $sql = "INSERT INTO tarjetas (nombre_tarjeta,dia_del_debito,medio_de_pago_id,limite,cuenta_bancaria_id,movimiento_bancario_id,usuario_tarjeta_id,usuario_id)
    values ('$nombre_tarjeta',$dia_del_debito,$medio_de_pago_id,$limite,$cuenta_bancaria_id,$movimiento_bancario_id,$usuario_tarjeta_id,$usuario)";
    $query= $conexion->prepare($sql);
    $query -> execute ();
    $salida ='ok';
  } catch (Exception $e) {
    $salida =$e -> getMessage();
  }
  return $salida;
}
function datos_tarjetas(){
  $conexion = conexion();
  $sql = "SELECT nombre_tarjeta AS tarjeta, num_cuenta,forma_de_pago,limite,movimientos.movimientos_nombre AS movimiento, usuarios_tarjeta, dia_del_debito, banco_nombre AS banco
          FROM tarjetas
          JOIN medio_de_pago on medio_de_pago_id = idmedio_de_pago
          JOIN cuentas_bancaria ON tarjetas.cuenta_bancaria_id = cuentas_bancaria.idcuentas_bancaria
          JOIN usuarios_tarjetas ON usuario_tarjeta_id = idusuarios_tarjetas
          JOIN movimientos ON movimiento_bancario_id = movimientos.idmovimientos_bancarios
          JOIN bancos ON banco_id = idbancos";
  $query2= $conexion->prepare($sql);
  $query2->execute();
  $resultados = $query2->fetchAll(PDO::FETCH_ASSOC);
  return $resultados;
}

function insertar_tipo_gasto($tipo_gasto,$usuario=1){
  $conexion = conexion();
  try {
    $sql = "INSERT INTO tipo_gasto (destino_gasto,usuario_id) values ('$tipo_gasto',$usuario)";
    var_dump($sql);
    $query= $conexion->prepare($sql);
    $query -> execute ();

  } catch (Exception $e) {
    echo "Hay un error: ".$e -> getMessage();
  }
}

function insertar_nombre_gasto($nombre_gasto,$medio_pago_id,$usuario=1){
  $conexion = conexion();
  try {
    $sql = "INSERT INTO gasto (nombre_gasto,medio_pago_id,usuario_id) values ('$nombre_gasto',$medio_pago_id,$usuario)";
    $query= $conexion->prepare($sql);
    $query -> execute ();
    $salida ='ok';
  } catch (Exception $e) {
    $salida =$e -> getMessage();
  }
  return $salida;
}

function datos_nombre_gasto(){
  $conexion = conexion();
  $sql = "SELECT nombre_gasto, forma_de_pago AS medio
FROM gasto
JOIN medio_de_pago ON medio_pago_id = idmedio_de_pago";
  $query2= $conexion->prepare($sql);
  $query2->execute();
  $resultados = $query2->fetchAll(PDO::FETCH_ASSOC);
  return $resultados;
}

function insertar_registro_gasto($fecha,$nombre_gasto_id,$importe,$tipo_gasto_id,$medio_pago_id,$cuotas_id,$pagado,$usuario=1){
  $conexion = conexion();
  try {
    $sql = "INSERT INTO registros_gasto (fecha,nombre_gasto_id,importe,tipo_gasto_id,medio_pago_id,cuotas_id,pagado,usuario_id)
    values ('$fecha',$nombre_gasto_id,$importe,$tipo_gasto_id,$medio_pago_id,$cuotas_id,$pagado,$usuario)";
    $query= $conexion->prepare($sql);
    $query -> execute ();
    $salida ='ok';
  } catch (Exception $e) {
    $salida =$e -> getMessage();
  }
  return $salida;
}

function datos_registros_gastos(){
  $conexion = conexion();
  $sql = "SELECT rg.fecha,rg.importe,nombre_gasto,destino_gasto,mp.forma_de_pago,cuotas.numero_cuotas AS cuotas, REPLACE (pagado,1,'SI') AS pagado, concat(year(rg.fecha),'-',month(rg.fecha)) AS periodo
          FROM registros_gasto rg
          JOIN gasto ON rg.nombre_gasto_id = idgasto
          JOIN tipo_gasto ON rg.tipo_gasto_id = idtipo_gasto
          JOIN medio_de_pago mp ON rg.medio_pago_id = mp.idmedio_de_pago
          JOIN cuotas ON rg.cuotas_id = cuotas.idcuotas";
  $query2= $conexion->prepare($sql);
  $query2->execute();
  $resultados = $query2->fetchAll(PDO::FETCH_ASSOC);
  return $resultados;
}

function sumar_gastos(){
  $total =0;
  $datos= datos_registros_gastos();
  foreach ($datos as $key => $value) {
    $total+= $value['importe'];
  }
return $total;
}

function datos_registros_gastos_pagados(){
  $conexion = conexion();
  $sql = "SELECT rg.fecha,rg.importe,nombre_gasto,destino_gasto,mp.forma_de_pago,cuotas.numero_cuotas AS cuotas,pagado
          FROM registros_gasto rg
          JOIN gasto ON rg.nombre_gasto_id = idgasto
          JOIN tipo_gasto ON rg.tipo_gasto_id = idtipo_gasto
          JOIN medio_de_pago mp ON rg.medio_pago_id = mp.idmedio_de_pago
          JOIN cuotas ON rg.cuotas_id = cuotas.idcuotas
          ";
  $query2= $conexion->prepare($sql);
  $query2->execute();
  $resultados = $query2->fetchAll(PDO::FETCH_ASSOC);

  $total =0;
  foreach ($resultados as $key => $value) {
    $total+= $value['importe'];
  }
return $total;
}
