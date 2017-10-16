<?php
require_once "../modelos/Banco.php";

$entidad_bancaria=new Banco();

$idbanco=isset($_POST["idbanco"])? limpiarCadena($_POST["idbanco"]):"";
$banco=isset($_POST["banco"])? limpiarCadena($_POST["banco"]):"";

switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($idbanco)){
            $rspta=$entidad_bancaria->insertar($banco);
            echo $rspta ? "Banco registrada" : "Banco no se pudo registrar";
        }
        else {
            $rspta=$entidad_bancaria->editar($idbanco,$banco);
            echo $rspta ? "Banco actualizada" : "Banco no se pudo actualizar";
        }
    break;

    case 'desactivar':
        $rspta=$entidad_bancaria->desactivar($idbanco);
        echo $rspta ? "Banco Desactivada" : "Banco no se puede desactivar";

    break;

    case 'eliminar':
        $rspta=$entidad_bancaria->eliminar($idbanco);
        echo $rspta ? "Banco Eliminado" : "Banco no se puede eliminar";

    break;

    case 'activar':
        $rspta=$entidad_bancaria->activar($idbanco);
        echo $rspta ? "Banco activada" : "Banco no se puede activar";

    break;

    case 'mostrar':
        $rspta=$entidad_bancaria->mostrar($idbanco);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);

    break;

    case 'listar':
        $rspta=$entidad_bancaria->listar();
        //Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>($reg->condicion)?
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idbanco.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idbanco.')"><i class="fa fa-ban"></i></button>'.
                    ' <button class="btn btn-danger" onclick="eliminar('.$reg->idbanco.')"><i class="fa fa-trash-o"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idbanco.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idbanco.')"><i class="fa fa-ban"></i></button>'.
                    ' <button class="btn btn-danger" onclick="eliminar('.$reg->idbanco.')"><i class="fa fa-trash-o"></i></button>',

                "1"=>$reg->banco,
                "2"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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
}
?>
