<?php
class Usuario{

  private $nombre;
  private $mail;
  private $fecha;
  private $edad;

  function __construct($nombre,$mail,$fecha,int $edad)
  {
    $this-> nombre = $nombre;
    $this-> mail =$mail;
    $this-> fecha =$fecha;
    $this-> edad =$edad;
  }

  public function saludar(){
    return $this-> nombre;

  }

  public function getNombre(){
    return $this->nombre;
  }

  public function getMail(){
    return $this->mail;
  }

  public function getFecha(){
    return $this->fecha;
  }

  public function getEdad(){
    return $this->edad;
  }

  public function setNombre($nombre){
    return $this->nombre=$nombre;
  }
  public function setMail($mail){

    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo "Esta dirección de correo ($mail) es válida.";
        $this->mail=$mail;
    }
  }

  public function setEdad($edad){

if (is_int($edad)) {
  $this->edad = $edad;
  Echo "se pudo modificar la edad a su nuevo valor ".$edad;
}else {
  Echo "No se puede modificar la edad, porque ".$edad." no es un entero. La edad es:". $this->edad;
}

  }

  public function calcularedad($fecha){
        list($Y,$m,$d) = explode("-",$fecha);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
      }

}





 ?>
