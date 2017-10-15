var tabla;

//Función que se ejecuta al inicio
function init(){
    mostrarform(false);
    listar();

    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);
    })

    //Cargamos los items al select banco
    $.post("../ajax/cuenta_bancaria.php?op=selectBanco", function(r){
                $("#idbanco").html(r);
                $('#idbanco').selectpicker('refresh');

    });
}

//Función limpiar
function limpiar()
{
    $("#cuenta_bancaria").val("");
    $("#idcuenta_bancaria").val("");
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
                    url: '../ajax/cuenta_bancaria.php?op=listar',
                    type : "get",
                    dataType : "json",
                    error: function(e){
                        console.log(e.responseText);
                    }
                },
        "bDestroy": true,
        "iDisplayLength": 20,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
// console.log(#formulario);
// throw new Error("my error message");

    $.ajax({
        url: "../ajax/cuenta_bancaria.php?op=guardaryeditar",
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

function mostrar(idcuenta_bancaria)
{
    $.post("../ajax/cuenta_bancaria.php?op=mostrar",{idcuenta_bancaria : idcuenta_bancaria}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#idbanco").val(data.idbanco);
        $('#idbanco').selectpicker('refresh');
        $("#cuenta_bancaria").val(data.cuenta_bancaria);
        $("#idcuenta_bancaria").val(data.idcuenta_bancaria);

    })
}

//Función para desactivar registros
function desactivar(idcuenta_bancaria)
{
    bootbox.confirm("¿Está Seguro de desactivar la Cuenta Bancaria?", function(result){
        if(result)
        {
            $.post("../ajax/cuenta_bancaria.php?op=desactivar", {idcuenta_bancaria : idcuenta_bancaria}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idcuenta_bancaria)
{
    bootbox.confirm("¿Está Seguro de activar la Cuenta Bancaria?", function(result){
        if(result)
        {
            $.post("../ajax/cuenta_bancaria.php?op=activar", {idcuenta_bancaria : idcuenta_bancaria}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}


init();
