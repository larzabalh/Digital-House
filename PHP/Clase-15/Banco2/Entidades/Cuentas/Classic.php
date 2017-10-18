<?php

class Classic extends Cuenta
{
	public function debitar($monto, $origen)
	{
		switch($origen)
		{
			case self::ORIGEN_BANELCO:
				$monto = $monto * 1.05;
				break;

			case self::ORIGEN_LINK:
				$monto = $monto * 1.10;
				break;

			case self::ORIGEN_CAJA:
			case self::ORIGEN_SERVICIOS:
			case self::ORIGEN_LIQUIDACION_HABERES:
				break;

			default:
				throw new Exception('El origen no existe');
		}

		$this->balance -= $monto;
		$this->actualizarFechaTransaccion();
	}

	public function acreditar($monto)
	{
		$monto = $monto * 0.95;

		parent::acreditar($monto);
	}


}