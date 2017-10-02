<?php
function conexion(){
  $dsn = 'mysql:host=localhost;dbname=movies_db;charset=utf8mb4;port:3306';
  $conexion_user= 'root';
  $conexion_pass='root';
  try {
    $conexion=new PDO($dsn,$conexion_user,$conexion_pass, [PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION]);
  } catch (PDOException $e) {
    echo "El error de conexion es: ".$e -> getMessage();
  }
  return $conexion;
}


function insertar($titulo,$rating,$premios,$duracion,$estreno){
  $conexion = conexion();
  try {
    $sql = "INSERT INTO movies (created_at, title, rating, awards, release_date, length)
                values (:creada, :titulo, :rating, :premios, :fecha, :duracion)";
    $stmt =$conexion -> prepare($sql);

    $creada = date('Y-m-d h:i:s');

    $stmt ->bindValue(':creada',$creada, PDO::PARAM_STR);
    $stmt ->bindValue(':titulo',$titulo, PDO::PARAM_STR);
    $stmt ->bindValue(':rating',$rating, PDO::PARAM_STR);
    $stmt ->bindValue(':premios',$premios, PDO::PARAM_INT);
    $stmt ->bindValue(':duracion',$duracion, PDO::PARAM_INT);
    $stmt ->bindValue(':fecha',$estreno, PDO::PARAM_STR);

    $stmt -> execute();
    $movies_id = $conexion ->lastInsertId();
    echo "La ultima peli tiene ID: ".$movies_id;

  } catch (Exception $e) {
    echo "Hay un error: ".$e -> getMessage();
  }
}

function buscar($titulo){
  $conexion = conexion();
  try {
    $sql = "SELECT * FROM movies WHERE title =:titulo";
    $stmt =$conexion -> prepare($sql);
    $stmt ->bindValue(':titulo',$titulo, PDO::PARAM_STR);
    $stmt->execute();
    $buscado = $stmt ->rowCount();
    $registro =$stmt->fetch(PDO::FETCH_ASSOC);
    ?><pre><?php
    var_dump($registro);
    }
    catch (Exception $e) {
      echo "Hay un error: ".$e -> getMessage();
    }
    return $registro;
}












 ?>
