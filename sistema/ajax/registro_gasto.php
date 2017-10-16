<?php
require_once "../modelos/Registro_gasto.php";

$registro=new Registro_gasto();

$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$idregistro_gasto=isset($_POST["idregistro_gasto"])? limpiarCadena($_POST["idregistro_gasto"]):"";
$importe=isset($_POST["importe"])? limpiarCadena($_POST["importe"]):"";
$nombre_gasto_id=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$tipo_gasto_id=isset($_POST["tipo_gasto"])? limpiarCadena($_POST["tipo_gasto"]):"";
$medio_pago_id=isset($_POST["forma_de_pago"])? limpiarCadena($_POST["forma_de_pago"]):"";
// var_dump($medio_pago_id);
// var_dump($importe);
// var_dump($idregistro_gasto);


switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($idregistro_gasto)){
            $rspta=$registro->insertar($fecha,$nombre_gasto_id,$importe,$tipo_gasto_id,$medio_pago_id);
            echo $rspta ? "Gasto registrado" : "Gasto no se pudo registrar";
        }
        else {
            $rspta=$registro->editar($idregistro_gasto,$fecha,$nombre_gasto_id,$importe,$tipo_gasto_id,$medio_pago_id);
            echo $rspta ? "Gasto actualizado" : "Gasto no se pudo actualizar";
        }
    break;

    case 'desactivar':
        $rspta=$registro->desactivar($idregistro_gasto);
        echo $rspta ? "Gasto Desactivado" : "Gasto no se puede desactivar";
    break;

    case 'eliminar':
        $rspta=$registro->eliminar($idregistro_gasto);
        echo $rspta ? "Gasto Eliminado" : "Gasto no se puede eliminar";
    break;

    case 'activar':
        $rspta=$registro->activar($idregistro_gasto);
        echo $rspta ? "Gasto activado" : "Gasto no se puede activar";
    break;

    case 'mostrar':
        $rspta=$registro->mostrar($idregistro_gasto);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
    break;

    case 'listar':
        $rspta=$registro->listar();
        //Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idregistro_gasto.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idregistro_gasto.')"><i class="fa fa-ban"></i></button>'.
                    ' <button class="btn btn-danger" onclick="eliminar('.$reg->idregistro_gasto.')"><i class="fa fa-trash-o"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idregistro_gasto.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idregistro_gasto.')"><i class="fa fa-ban"></i></button>'.
                    ' <button class="btn btn-danger" onclick="eliminar('.$reg->idregistro_gasto.')"><i class="fa fa-trash-o"></i></button>',
                "1"=>$reg->fecha,
                "2"=>$reg->importe,
                "3"=>$reg->nombre,
                "4"=>$reg->tipo_gasto,
                "5"=>$reg->forma_de_pago,
                "6"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
                '<span class="label bg-red">Desactivado</span>'
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);

    break;

    case "selectGasto":
  		require_once "../modelos/Gasto.php";
  		$medio = new Gasto();

  		$rspta = $medio->select();

  		while ($reg = $rspta->fetch_object())
  				{
  					echo '<option value=' . $reg->idgasto . '>' . $reg->nombre . '</option>';
  				}
  	break;
    case "selectMedio_de_pago":
  		require_once "../modelos/Gasto.php";
  		$medio = new Gasto();

  		$rspta = $medio->select();

  		while ($reg = $rspta->fetch_object())
  				{
  					echo '<option value=' . $reg->idgasto . '>' . $reg->forma_de_pago . '</option>';
  				}
  	break;

    case "selectTipo_de_gasto":
  		require_once "../modelos/Tipo_gasto.php";
  		$medio = new Tipo_gasto();

  		$rspta = $medio->select();

  		while ($reg = $rspta->fetch_object())
  				{
  					echo '<option value=' . $reg->idtipo_gasto . '>' . $reg->tipo_gasto . '</option>';
  				}
  	break;
  }
  ?>
