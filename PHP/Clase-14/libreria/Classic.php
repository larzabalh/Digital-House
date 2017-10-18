<?php

class Classic extends Cuenta
{

  function __construct($cbu)
  {
    $this->cbu =$cbu;
  }

  public function debitar ($monto,$medio,$fecha){
    $this->balance = $this->balance - $monto;
    $this->setFecha_ultimo_movimiento($fecha);
  }

  public function acreditar ($monto,$medio,$fecha){
    $this->balance = $this->balance + $monto;
    $this->setFecha_ultimo_movimiento($fecha);
  }

}



 ?>
