<?php

class Mutlinacional extends Empresas
{
  Private $pais;

  function __construct($razon_social,$cuit,$fecha_constitucion,$pais,$email,$pass)
  {
    $this->razon_social = $razon_social;
    $this->cuit = $cuit;
    $this->fecha_constitucion = $fecha_constitucion;
    $this->pais = $pais;
    $this->email = $email;
    $this->pass = $pass;

  }

  public function setPais($pais){
    $this->pais =$pais;
  }

  public function getPais(){
    return $this->pais;
  }



}


 ?>
