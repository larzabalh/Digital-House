<?php
class Persona extends Cliente
{
   private $nombre;
   private $apellido;
   private $documento;
   private $nacimiento;

   public function __construct(Cuenta $cuenta, $email, $pass, $nombre, $apellido, $documento, $nacimiento)
   {
       parent::__construct($cuenta, $email, $pass);

       $this->nombre = $nombre;
       $this->apellido = $apellido;
       $this->documento = $documento;
       $this->nacimiento = $nacimiento;
   }

   public function setNombre($nombre){
     $this->nombre = $nombre;
   }
   public function getNombre(){
     return $this->nombre;
   }
   public function setApellido($apellido){
     $this->apellido = $apellido;
   }
   public function getApellido(){
     return $this->apellido;
   }
   public function setDocumento($documento){
     $this->documento = $documento;
   }
   public function getDocumento(){
     return $this->documento;
   }
   public function setNacimiento($nacimiento){
     $this->nacimiento = $nacimiento;
   }
   public function getNacimiento(){
     return $this->nacimiento;
   }

    public function cobrarServicio()
    {
        if($this->cuenta instanceof Classic)
        {
            $this->cuenta->debitar(100, Cuenta::ORIGEN_SERVICIOS);
        }
    }


}
