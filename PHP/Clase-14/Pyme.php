<?php

class Pyme extends Empresas
{
  Private $provincia;

  function __construct($razon_social,$cuit,$fecha_constitucion,$provincia,$email,$pass)
  {
    $this->razon_social = $razon_social;
    $this->cuit = $cuit;
    $this->fecha_constitucion = $fecha_constitucion;
    $this->provincia = $provincia;
    $this->email = $email;
    $this->pass = $pass;

  }

  public function setProvincia($provincia){
    $this->provincia =$provincia;
  }

  public function getProvincia(){
    return $this->provincia;
  }

}


 ?>
