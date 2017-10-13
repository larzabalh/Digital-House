<?php

class Empresas extends Cliente
{
  Private $razon_social;
  Private $cuit;
  Private $fecha_constitucion;

  function __construct($razon_social,$cuit,$fecha_constitucion)
  {
    $this->razon_social = $razon_social;
    $this->cuit = $cuit;
    $this->fecha_constitucion = $fecha_constitucion;

  }

  public function setRazon_Social($razon_social){
    $this->razon_social = $razon_social;
  }
  public function getRazon_Social(){
    return $this->razon_social;
  }

  public function setCuit ($cuit){
    $this->cuit = $cuit;
  }

  public function getCuit(){
    return $this->cuit;
  }

  public function setFecha_constitucion($fecha){
    $this->fecha_constitucion =$fecha;
  }

  public function getFecha_constitucion(){
    return $this->fecha_constitucion;
  }

}


 ?>
