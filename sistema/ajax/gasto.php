<?php
require_once "../modelos/Gasto.php";

$gasto=new Gasto();

$idgasto=isset($_POST["idgasto"])? limpiarCadena($_POST["idgasto"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$medio_pago_id=isset($_POST["medio_pago_id"])? limpiarCadena($_POST["medio_pago_id"]):"";
// var_dump($medio_pago_id);
// var_dump($nombre);
// var_dump($idgasto);


switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($idgasto)){
            $rspta=$gasto->insertar($nombre,$medio_pago_id);
            echo $rspta ? "Gasto registrado" : "Gasto no se pudo registrar";
        }
        else {
            $rspta=$gasto->editar($idgasto,$nombre,$medio_pago_id);
            echo $rspta ? "Gasto actualizado" : "Gasto no se pudo actualizar";
        }
    break;

    case 'desactivar':
        $rspta=$gasto->desactivar($idgasto);
        echo $rspta ? "Gasto Desactivado" : "Gasto no se puede desactivar";
    break;

    case 'eliminar':
        $rspta=$gasto->eliminar($idgasto);
        echo $rspta ? "Gasto Eliminado" : "Gasto no se puede eliminar";
    break;

    case 'activar':
        $rspta=$gasto->activar($idgasto);
        echo $rspta ? "Gasto activado" : "Gasto no se puede activar";
    break;

    case 'mostrar':
        $rspta=$gasto->mostrar($idgasto);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
    break;

    case 'listar':
        $rspta=$gasto->listar();
        //Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idgasto.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idgasto.')"><i class="fa fa-ban"></i></button>'.
                    ' <button class="btn btn-danger" onclick="eliminar('.$reg->idgasto.')"><i class="fa fa-trash-o"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idgasto.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idgasto.')"><i class="fa fa-ban"></i></button>'.
                    ' <button class="btn btn-danger" onclick="eliminar('.$reg->idgasto.')"><i class="fa fa-trash-o"></i></button>',
                "1"=>$reg->nombre,
                "2"=>$reg->forma_de_pago,
                "3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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

    case "selectAlgo":
  		require_once "../modelos/Medio_de_pago.php";
  		$medio = new Medio_de_pago();

  		$rspta = $medio->select();

  		while ($reg = $rspta->fetch_object())
  				{
  					echo '<option value=' . $reg->idmedio_de_pago . '>' . $reg->forma_de_pago . '</option>';
  				}
  	break;
  }
  ?>
