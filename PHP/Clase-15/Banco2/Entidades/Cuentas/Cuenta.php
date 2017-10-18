<?php

abstract class Cuenta
{
   const ORIGEN_BANELCO = 1;
   const ORIGEN_LINK = 2;
   const ORIGEN_CAJA = 3;
   const ORIGEN_SERVICIOS = 4;
   const ORIGEN_LIQUIDACION_HABERES = 5;

   protected $CBU;
   protected $balance = 0;
   protected $fechaUltimoMovimiento;

   public function __construct($CBU)
   {
      $this->CBU = $CBU;
   }

   public function getCBU()
   {
      return $this->CBU;
   }

   public function getBalance()
   {
      return $this->balance;
   }

   public function getFechaUltimoMovimiento()
   {
      return $this->fechaUltimoMovimiento;
   }

   public abstract function debitar($monto, $origen);

   public function acreditar($monto)
   {
      $this->balance += $monto;
      $this->actualizarFechaTransaccion();
   }

   protected function actualizarFechaTransaccion()
   {
      $this->fechaUltimoMovimiento = date('Y-m-d H:i:s');
   }
}
