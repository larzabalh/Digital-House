<?php

abstract class Cliente
{
  protected $cuenta;
  protected $email;
  protected $pass;

  public function __construct(Cuenta $cuenta, $email, $pass)
  {
    $this->cuenta = $cuenta;

    $this->setEmail($email);
    $this->setPass($pass);
  }

  /**
   * @return mixed
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param mixed $email
   * @throws Exception
   */
  public function setEmail($email)
  {
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $this->email = $email;
    }
	else
	{
		throw new Exception('El email es inválido');
	}
  }

  /**
   * @return mixed
   */
  public function getPass()
  {
    return $this->pass;
  }

  /**
   * @param mixed $pass
   */
  public function setPass($pass)
  {
    $this->pass = password_hash($pass, PASSWORD_DEFAULT);
  }

  public function getCuenta()
  {
    return $this->cuenta;
  }

  public abstract function cobrarServicio();
}









