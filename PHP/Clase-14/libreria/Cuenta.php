<?php

 abstract class Cuenta{

  private $cbu;
  protected $balance;
  private $fecha_ultimo_movimiento;


  function __construct($cbu)
  {
    $this->cbu =$cbu;
  }

  function getCbu (){
    return $this->cbu;
  }
  function setCbu($cbu){
    $this->cbu=$cbu;
  }

  function getBalance (){
    return $this->balance;
  }
  function setBalance($balance){
    $this->balance=$balance;
  }

  function getFecha_ultimo_movimiento(){
    return $this->balance;
  }
  function setFecha_ultimo_movimiento($Fecha_ultimo_movimiento){
    $this->Fecha_ultimo_movimiento=$Fecha_ultimo_movimiento;
  }


// Agregar un método abstracto para ​ debitar ​ cierto monto que reciba como parámetro el
// monto y desde donde se está haciendo la transacción (cajero Banelco, cajero Link,
// caja). Agregar otro método (no abstracto) que permita ​ acreditar ​ cierto monto (y
// programar su comportamiento). (Tener en cuenta que cada método debe, además,
// modificar la fecha de último movimiento).

  public abstract function debitar ($monto,$medio,$fecha);
  public function acreditar ($monto,$medio,$fecha){}

}


 ?>
