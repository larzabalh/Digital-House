<?php

class Multinacional extends Cliente implements Liquidable
{
   private $CUIT;
   private $razonSocial;

   public function __construct(Cuenta $cuenta, $email, $pass, $CUIT, $razonSocial)
   {
      parent::__construct($cuenta, $email, $pass);

      $this->CUIT = $CUIT;
      $this->razonSocial = $razonSocial;
   }

   public function setCUIT($CUIT)
   {
      $this->CUIT = $CUIT;
   }
   public function getCUIT()
   {
      return $this->CUIT;
   }
   public function setRazonSocial($razonSocial)
   {
      $this->razonSocial = $razonSocial;
   }
   public function getRazonSocial()
   {
      return $this->razonSocial;
   }
}
