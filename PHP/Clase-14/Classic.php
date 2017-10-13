<?php
include 'libreria.php';

class Classic extends Cuenta
{

  function __construct($cbu)
  {
    $this->cbu =$cbu;
  }

  function debitar ($monto,$medio,$fecha){
    $this->balance = $this->balance - $monto;
    $this->setFecha_ultimo_movimiento($fecha);
  }

  function acreditar ($monto,$medio,$fecha){
    $this->balance = $this->balance + $monto;
    $this->setFecha_ultimo_movimiento($fecha);
  }

}



 ?>
