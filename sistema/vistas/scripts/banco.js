var tabla;

//Función que se ejecuta al inicio
function init(){
    mostrarform(false);
    listar();
    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);
    })
}

//Función limpiar
function limpiar()
{
    $("#banco").val("");
    $("#idbanco").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
    limpiar();
    if (flag)
    {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }
    else
    {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//Función cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
}

//Función Listar
function listar()
{
    tabla=$('#tbllistado').dataTable(
    {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        "ajax":
                {
                    url: '../ajax/banco.php?op=listar',
                    type : "get",
                    dataType : "json",
                    error: function(e){
                        console.log(e.responseText);
                    }
                },
        "bDestroy": true,
        "iDisplayLength": 10,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/banco.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos)
        {
              bootbox.alert(datos);
              mostrarform(false);
              tabla.ajax.reload();
        }

    });
    limpiar();
}

function mostrar(idbanco)
{
    $.post("../ajax/banco.php?op=mostrar",{idbanco : idbanco}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#banco").val(data.banco);
        $("#idbanco").val(data.idbanco);

    })
}

//Función para desactivar registros
function desactivar(idbanco)
{
    bootbox.confirm("¿Está Seguro de el Banco?", function(result){
        if(result)
        {
            $.post("../ajax/banco.php?op=desactivar", {idbanco : idbanco}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idbanco)
{
    bootbox.confirm("¿Está Seguro de activar el Banco?", function(result){
        if(result)
        {
            $.post("../ajax/banco.php?op=activar", {idbanco : idbanco}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}


init();
