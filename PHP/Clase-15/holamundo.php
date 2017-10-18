<?php

/**
 *
 */
class Base
{

public function decirHola(){
echo "Hola";

}

}

trait DecirMundo
{
  public function decirMundo()
  {
    echo " Mundo";
  }
}


class miHolaMundo extends Base
{
  use DecirMundo;

}

$saludar= new miHolaMundo();
echo $saludar->decirHola().' '.$saludar->DecirMundo() ;




 ?>
