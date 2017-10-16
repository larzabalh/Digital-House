<?php
require_once "../modelos/Cuenta_bancaria.php";

$cuenta=new Cuenta_bancaria();

$idcuenta_bancaria=isset($_POST["idcuenta_bancaria"])? limpiarCadena($_POST["idcuenta_bancaria"]):"";
$cuenta_bancaria=isset($_POST["cuenta_bancaria"])? limpiarCadena($_POST["cuenta_bancaria"]):"";
$idbanco=isset($_POST["idbanco"])? limpiarCadena($_POST["idbanco"]):"";
// var_dump($idbanco);
// var_dump($cuenta_bancaria);
// var_dump($idcuenta_bancaria);


switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($idcuenta_bancaria)){
            $rspta=$cuenta->insertar($cuenta_bancaria,$idbanco);
            echo $rspta ? "Cuenta Bancaria registrada" : "Cuenta Bancaria no se pudo registrar";
        }
        else {
            $rspta=$cuenta->editar($idcuenta_bancaria,$cuenta_bancaria,$idbanco);
            echo $rspta ? "Cuenta Bancaria actualizada" : "Cuenta Bancaria no se pudo actualizar";
        }
    break;

    case 'desactivar':
        $rspta=$cuenta->desactivar($idcuenta_bancaria);
        echo $rspta ? "Cuenta Bancaria Desactivada" : "Cuenta Bancaria no se puede desactivar";
        break;
    break;

    case 'activar':
        $rspta=$cuenta->activar($idcuenta_bancaria);
        echo $rspta ? "Cuenta Bancaria activada" : "Cuenta Bancaria no se puede activar";
        break;
    break;

    case 'mostrar':
        $rspta=$cuenta->mostrar($idcuenta_bancaria);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
    break;

    case 'listar':
        $rspta=$cuenta->listar();
        //Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcuenta_bancaria.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idcuenta_bancaria.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idcuenta_bancaria.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idcuenta_bancaria.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->idbanco,
                "2"=>$reg->cuenta_bancaria,
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

    case "selectBanco":
  		require_once "../modelos/Banco.php";
  		$entidad_bancaria = new Banco();

  		$rspta = $entidad_bancaria->select();

  		while ($reg = $rspta->fetch_object())
  				{
  					echo '<option value=' . $reg->idbanco . '>' . $reg->banco . '</option>';
  				}
  	break;
  }
  ?>
