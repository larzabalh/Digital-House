<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Gasto
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($nombre,$medio_pago_id)
    {
        $sql="INSERT INTO gasto (nombre,medio_pago_id,condicion)
        VALUES ('$nombre','$medio_pago_id','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idgasto,$nombre,$medio_pago_id)
    {
        $sql="UPDATE gasto SET nombre='$nombre',medio_pago_id =$medio_pago_id WHERE idgasto='$idgasto'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idgasto)
    {
        $sql="UPDATE gasto SET condicion='0' WHERE idgasto='$idgasto'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idgasto)
    {
        $sql="UPDATE gasto SET condicion='1' WHERE idgasto='$idgasto'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para eliminar el gasto
    public function eliminar($idgasto)
    {
        $sql="DELETE FROM gasto WHERE idgasto='$idgasto'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idgasto)
    {
        $sql="SELECT * FROM gasto WHERE idgasto='$idgasto'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT idgasto,nombre,medio_de_pago.forma_de_pago as forma_de_pago, gasto.condicion as condicion
          FROM gasto
          INNER JOIN medio_de_pago ON gasto.medio_pago_id = medio_de_pago.idmedio_de_pago";
        return ejecutarConsulta($sql);
    }

    public function select()
  	{
  		$sql="SELECT idgasto,nombre,medio_de_pago.forma_de_pago as forma_de_pago, gasto.condicion as condicion
        FROM gasto
        INNER JOIN medio_de_pago ON gasto.medio_pago_id = medio_de_pago.idmedio_de_pago";
  		return ejecutarConsulta($sql);
  	}

    //Implementar un método para listar los registros activos
  	public function listarActivos()
  	{
  		$sql="SELECT medio_de_pago ,gasto
        FROM gasto
        JOIN medio_de_pago ON gasto.medio_pago_id = medio_de_pago.medio_pago_id
        WHERE gasto.condicion='1'";
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
