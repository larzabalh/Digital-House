<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Registro_gasto
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($fecha,$nombre_gasto_id,$importe,$tipo_gasto_id,$medio_pago_id)
    {
        $sql="INSERT INTO registro_gasto (fecha,nombre_gasto_id,importe,tipo_gasto_id,medio_pago_id)
        VALUES ('$fecha','$nombre_gasto_id','$importe','$tipo_gasto_id','$medio_pago_id')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idregistro_gasto,$fecha,$nombre_gasto_id,$importe,$tipo_gasto_id,$medio_pago_id)
    {
        $sql="UPDATE registro_gasto SET fecha='$fecha',nombre_gasto_id=$nombre_gasto_id,importe=$importe,tipo_gasto=$tipo_gasto_id,medio_pago_id =$medio_pago_id WHERE idregistro_gasto='$idregistro_gasto'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idregistro_gasto)
    {
        $sql="UPDATE registro_gasto SET condicion='0' WHERE idregistro_gasto='$idregistro_gasto'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idregistro_gasto)
    {
        $sql="UPDATE registro_gasto SET condicion='1' WHERE idregistro_gasto='$idregistro_gasto'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para eliminar el gasto
    public function eliminar($idregistro_gasto)
    {
        $sql="DELETE FROM registro_gasto WHERE idregistro_gasto='$idregistro_gasto'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idregistro_gasto)
    {
        $sql="SELECT idregistro_gasto,rg.fecha,rg.importe,gasto.idgasto,tipo_gasto_id,rg.medio_pago_id,rg.condicion
          FROM registro_gasto rg
          JOIN gasto ON rg.nombre_gasto_id = gasto.idgasto
          JOIN tipo_gasto ON rg.tipo_gasto_id = tipo_gasto.idtipo_gasto
          JOIN medio_de_pago mp ON rg.medio_pago_id = mp.idmedio_de_pago
          WHERE idregistro_gasto='$idregistro_gasto'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT idregistro_gasto,rg.fecha,rg.importe,gasto.nombre,tipo_gasto.tipo_gasto,mp.forma_de_pago,rg.condicion
          FROM registro_gasto rg
          JOIN gasto ON rg.nombre_gasto_id = gasto.idgasto
          JOIN tipo_gasto ON rg.tipo_gasto_id = tipo_gasto.idtipo_gasto
          JOIN medio_de_pago mp ON rg.medio_pago_id = mp.idmedio_de_pago
          ";
        return ejecutarConsulta($sql);
    }

    // //Implementar un método para listar los registros activos
  	// public function listarActivos()
  	// {
  	// 	$sql="SELECT medio_de_pago ,gasto
    //     FROM gasto
    //     JOIN medio_de_pago ON gasto.medio_pago_id = medio_de_pago.medio_pago_id
    //     WHERE gasto.condicion='1'";
  	// 	return ejecutarConsulta($sql);
  	// }

  	// //Implementar un método para listar los registros activos, su último precio y el stock (vamos a unir con el último registro de la tabla detalle_ingreso)
  	// public function listarActivosVenta()
  	// {
  	// 	$sql="SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,(SELECT precio_venta FROM detalle_ingreso WHERE idarticulo=a.idarticulo order by iddetalle_ingreso desc limit 0,1) as precio_venta,a.descripcion,a.imagen,a.condicion FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
  	// 	return ejecutarConsulta($sql);
  	// }
  }

  ?>
