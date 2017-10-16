<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Medio_de_pago
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    // //Implementamos un método para insertar registros
    // public function insertar($banco)
    // {
    //     $sql="INSERT INTO banco (banco,condicion)
    //     VALUES ('$banco','1')";
    //     return ejecutarConsulta($sql);
    // }
    //
    // //Implementamos un método para editar registros
    // public function editar($idbanco,$banco)
    // {
    //     $sql="UPDATE banco SET banco='$banco' WHERE idbanco='$idbanco'";
    //     return ejecutarConsulta($sql);
    // }
    //
    // //Implementamos un método para desactivar categorías
    // public function desactivar($idbanco)
    // {
    //     $sql="UPDATE banco SET condicion='0' WHERE idbanco='$idbanco'";
    //     return ejecutarConsulta($sql);
    // }
    //
    // //Implementamos un método para activar categorías
    // public function activar($idbanco)
    // {
    //     $sql="UPDATE banco SET condicion='1' WHERE idbanco='$idbanco'";
    //     return ejecutarConsulta($sql);
    // }
    //
    // //Implementamos un método para activar categorías
    // public function eliminar($idbanco)
    // {
    //     $sql="DELETE FROM banco WHERE idbanco='$idbanco'";
    //     return ejecutarConsulta($sql);
    // }
    //
    //
    // //Implementar un método para mostrar los datos de un registro a modificar
    // public function mostrar($idbanco)
    // {
    //     $sql="SELECT * FROM banco WHERE idbanco='$idbanco'";
    //     return ejecutarConsultaSimpleFila($sql);
    // }

    //Implementar un método para listar los registros
    // public function listar()
    // {
    //     $sql="SELECT * FROM medio_de_pago";
    //     return ejecutarConsulta($sql);
    // }
    //Implementar un método para listar los registros y mostrar en el select
  	public function select()
  	{
  		$sql="SELECT * FROM medio_de_pago where condicion=1";
  		return ejecutarConsulta($sql);
  	}
}

?>
