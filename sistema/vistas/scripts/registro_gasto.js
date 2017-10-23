var tabla;

//Función que se ejecuta al inicio
function init(){
    mostrarform(false);
    listar();

    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);
    })

    //Cargamos los items al select Periodo
    $.post("../ajax/registro_gasto.php?op=selectPeriodo", function(r){
                $("#periodo").html(r);
                $('#periodo').selectpicker('refresh');

    })

    //Cargamos los items al select Gasto
    $.post("../ajax/registro_gasto.php?op=selectGasto", function(r){
                $("#nombre").html(r);
                $('#nombre').selectpicker('refresh');

    })

    //Cargamos los items al select Gasto
    $.post("../ajax/registro_gasto.php?op=selectTipo_de_gasto", function(r){
                $("#tipo_gasto").html(r);
                $('#tipo_gasto').selectpicker('refresh');

    })

    //Cargamos los items al select Medio de Pago
    $.post("../ajax/registro_gasto.php?op=selectMedio_de_pago", function(r){
                $("#forma_de_pago").html(r);
                $('#forma_de_pago').selectpicker('refresh');

    })

    ;
}

//Función limpiar
function limpiar()
{
    $("#importe").val("");
    $("#fecha").val("");
    $("#idregistro_gasto").val("");
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
                    url: '../ajax/registro_gasto.php?op=listar',
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
        url: "../ajax/registro_gasto.php?op=guardaryeditar",
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

function mostrar(idregistro_gasto)
{
    $.post("../ajax/registro_gasto.php?op=mostrar",{idregistro_gasto : idregistro_gasto}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#nombre").val(data.idgasto);
        $('#nombre').selectpicker('refresh');
        $("#tipo_gasto").val(data.tipo_gasto_id);
        $('#tipo_gasto').selectpicker('refresh');
        $("#forma_de_pago").val(data.medio_pago_id);
        $('#forma_de_pago').selectpicker('refresh');
        $("#importe").val(data.importe);
        $("#idregistro_gasto").val(data.idregistro_gasto);

    })
}

//Función para desactivar registros
function desactivar(idregistro_gasto)
{
    bootbox.confirm("¿Está Seguro de desactivar la Cuenta Bancaria?", function(result){
        if(result)
        {
            $.post("../ajax/registro_gasto.php?op=desactivar", {idregistro_gasto : idregistro_gasto}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function eliminar(idregistro_gasto)
{
    bootbox.confirm("¿Está Seguro de eliminar el Gasto?", function(result){
        if(result)
        {
            $.post("../ajax/registro_gasto.php?op=eliminar", {idregistro_gasto : idregistro_gasto}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idregistro_gasto)
{
    bootbox.confirm("¿Está Seguro de activar la Cuenta Bancaria?", function(result){
        if(result)
        {
            $.post("../ajax/registro_gasto.php?op=activar", {idregistro_gasto : idregistro_gasto}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function listar_periodo(){

  $('#periodo').change(function(){
    // var selection = $('#periodo option:selected');
    // var periodo = (selection.text());
    var periodo = $("#periodo option:selected").text();

      // $('#valor').html(periodo);


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

                    url: '../ajax/registro_gasto.php?op=listar_periodo',
                    data: {periodo:periodo},
                    type : "get",
                    dataType : "json",
                    error: function(e){
                        console.log(e.responseText);
                    }
                }.done (function(data){
                  var json_info = JSON.parse(data);
                  $('#jose').html(json_info);              
                });
        "bDestroy": true,
        "iDisplayLength": 20,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();


  })
}


init();
