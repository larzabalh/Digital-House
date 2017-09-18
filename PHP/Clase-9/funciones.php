<?php

function existe ($archivo){

if (file_exists($archivo)){
  $recurso=fopen ($archivo,'a+');
  }
  else {
  $recurso=fopen ($archivo,'w+');
  }
  return $recurso;
}


function guardar($data){
    //si post esta con datos:
    if ($data) {

        // echo "Esto es el POST<br>";
        // var_dump($_POST);
        unset($data['submitted']);
        unset($data['Submit']);
        $data['clave'] = password_hash($data['clave'],PASSWORD_DEFAULT);

        $json=$data;
        // echo "<br>";
        // echo "Esto es la variable JSON<br>";
        // var_dump($json);
        // echo "<br>";
        // echo "Lo que sigue seria el STRING DEL JSON<br>";
        $escribo=json_encode ($json);
        // var_dump($escribo);

        $recurso= existe ("bd.json");
        $archivo = "bd.json";
        $escribo = $escribo."\n";
        fwrite ($recurso,$escribo);

    //lo redirijo a que lo guardo y esta validado
    header('Location: validado.php');
  }
}

function requerido($campo){
    if (trim($campo) == '') {
      return false;
    }else {
      return true;
          }

    }

function validar_mail($email){

  if (filter_var($email,FILTER_VALIDATE_EMAIL)===FALSE) {
    return false;
  }else {
    return true;
  }
}

function buscar_usuario($email,$clave){
$recurso = existe("bd.json");
    while( $linea = fgets($recurso) ){
      $usuario = json_decode($linea, true);
        if ($usuario["email"]==$email && password_verify($clave , $usuario["clave"])) {
          return $usuario;
          }
        }
      return false;
}







function buscar_mail($email){
  $recurso = existe("bd.json");
  while( $linea = fgets($recurso) ){
    //echo 'linea->'.$linea.'<br>';
    $linea = json_decode($linea, true);
    //var_dump($linea);
        if ($linea["email"]==$email) {
        //  echo '-->Lo encontré<--';
          return true;
        }
  }
  return false;
}

function buscar_clave($clave){
  $recurso = existe("bd.json");
  while( $linea = fgets($recurso) ){
    //echo 'linea->'.$linea.'<br>';
    $linea = json_decode($linea, true);
    //var_dump($linea);
        if ($linea["clave"]==$clave) {
        //  echo '-->Lo encontré<--';
          return true;
        }
  }
  return false;
}


?>
