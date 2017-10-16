<?php
require_once "../modelos/Tipo_gasto.php";

$objeto_uncampo=new Tipo_gasto();

$idtipo_gasto=isset($_POST["idtipo_gasto"])? limpiarCadena($_POST["idtipo_gasto"]):"";
$tipo_gasto=isset($_POST["tipo_gasto"])? limpiarCadena($_POST["tipo_gasto"]):"";

switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($idtipo_gasto)){
            $rspta=$objeto_uncampo->insertar($tipo_gasto);
            echo $rspta ? "Tipo Gasto registrada" : "Tipo Gasto no se pudo registrar";
        }
        else {
            $rspta=$objeto_uncampo->editar($idtipo_gasto,$tipo_gasto);
            echo $rspta ? "Tipo Gasto actualizada" : "Tipo Gasto no se pudo actualizar";
        }
    break;

    case 'desactivar':
        $rspta=$objeto_uncampo->desactivar($idtipo_gasto);
        echo $rspta ? "Tipo Gasto Desactivada" : "Tipo Gasto no se puede desactivar";
        break;
    break;

    case 'activar':
        $rspta=$objeto_uncampo->activar($idtipo_gasto);
        echo $rspta ? "Tipo Gasto activada" : "Tipo Gasto no se puede activar";
        break;
    break;

    case 'mostrar':
        $rspta=$objeto_uncampo->mostrar($idtipo_gasto);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
    break;

    case 'listar':
        $rspta=$objeto_uncampo->listar();
        //Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idtipo_gasto.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idtipo_gasto.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idtipo_gasto.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idtipo_gasto.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->tipo_gasto,
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
