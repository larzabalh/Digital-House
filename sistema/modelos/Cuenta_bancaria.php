<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Cuenta_bancaria
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($cuenta_bancaria,$idbanco)
    {
        $sql="INSERT INTO cuenta_bancaria (cuenta_bancaria,idbanco,condicion)
        VALUES ('$cuenta_bancaria','$idbanco','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idcuenta_bancaria,$cuenta_bancaria,$idbanco)
    {
        $sql="UPDATE cuenta_bancaria SET cuenta_bancaria='$cuenta_bancaria',idbanco =$idbanco WHERE idcuenta_bancaria='$idcuenta_bancaria'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idcuenta_bancaria)
    {
        $sql="UPDATE cuenta_bancaria SET condicion='0' WHERE idcuenta_bancaria='$idcuenta_bancaria'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idcuenta_bancaria)
    {
        $sql="UPDATE cuenta_bancaria SET condicion='1' WHERE idcuenta_bancaria='$idcuenta_bancaria'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idcuenta_bancaria)
    {
        $sql="SELECT * FROM cuenta_bancaria WHERE idcuenta_bancaria='$idcuenta_bancaria'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT idcuenta_bancaria,cuenta_bancaria,banco.banco as idbanco ,cuenta_bancaria.condicion
          FROM cuenta_bancaria
          INNER JOIN banco ON cuenta_bancaria.idbanco = banco.idbanco";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para listar los registros activos
  	public function listarActivos()
  	{
  		$sql="SELECT banco ,cuenta_bancaria
        FROM cuenta_bancaria
        JOIN banco ON cuenta_bancaria.idbanco = banco.idbanco
        WHERE cuenta_bancaria.condicion='1'";
  		return ejecutarConsulta($sql);
  	}

  	//Implementar un método para listar los registros activos, su último precio y el stock (vamos a unir con el último registro de la tabla detalle_ingreso)
  	public function listarActivosVenta()
  	{
  		$sql="SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,(SELECT precio_venta FROM detalle_ingreso WHERE idarticulo=a.idarticulo order by iddetalle_ingreso desc limit 0,1) as precio_venta,a.descripcion,a.imagen,a.condicion FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
  		return ejecutarConsulta($sql);
  	}
  }

  ?>
