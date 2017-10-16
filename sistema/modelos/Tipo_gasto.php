<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Tipo_gasto
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($tipo_gasto)
    {
        $sql="INSERT INTO tipo_gasto (tipo_gasto,condicion)
        VALUES ('$tipo_gasto','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idtipo_gasto,$tipo_gasto)
    {
        $sql="UPDATE tipo_gasto SET tipo_gasto='$tipo_gasto' WHERE idtipo_gasto='$idtipo_gasto'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idtipo_gasto)
    {
        $sql="UPDATE tipo_gasto SET condicion='0' WHERE idtipo_gasto='$idtipo_gasto'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idtipo_gasto)
    {
        $sql="UPDATE tipo_gasto SET condicion='1' WHERE idtipo_gasto='$idtipo_gasto'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idtipo_gasto)
    {
        $sql="SELECT * FROM tipo_gasto WHERE idtipo_gasto='$idtipo_gasto'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT * FROM tipo_gasto";
        return ejecutarConsulta($sql);
    }
    //Implementar un método para listar los registros y mostrar en el select
  	public function select()
  	{
  		$sql="SELECT * FROM tipo_gasto where condicion=1";
  		return ejecutarConsulta($sql);
  	}
}

?>
