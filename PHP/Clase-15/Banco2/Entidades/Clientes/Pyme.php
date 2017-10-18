<?php

class Pyme extends Cliente implements Liquidable
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
   public function setrazonSocial($razonSocial)
   {
      $this->razonSocial = $razonSocial;
   }
   public function getrazonSocial()
   {
      return $this->razonSocial;
   }

   public function liquidarHaberes(Persona $persona, $monto)
   {
      $persona->getCuenta()->acreditar($monto);
      $this->cuenta->debitar($monto * 1.01, Cuenta::ORIGEN_LIQUIDACION_HABERES);
   }
}
