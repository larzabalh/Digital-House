<?php
include "../metas/funciones.php";
$conexion= conexion();
$resultados =tabla('tipo_gasto');

$tipo_gasto= isset ($_POST['tipo_gasto'])? $_POST['tipo_gasto'] : null;

if ($_POST) {
    $errores= array();
    if (empty($tipo_gasto)){
      $errores['error']= '** Por favor rellenar el campo BANCO';
    }
    if (count($errores)==0){
      insertar_tipo_gasto($tipo_gasto,$usuario=1);
      }
    }


 ?>

<!DOCTYPE html>
<html lang="es">
<?php include "meta.php" ?>
<body>

    <div id="wrapper">

      <?php include "nav.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">FORMULARIO</h1>
                </div>
                <div class="col-lg-6">
                    <h1 class="page-header">DESTINO DEL GASTO</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            FORMULARIO DE ALTA
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="tipo_gasto.php" method="post" role="form">
                                        <div class="form-group">
                                            <label>ALTA TIPO GASTO</label>
                                            <input name="tipo_gasto" class="form-control" placeholder="">
                                        </div>
                                        <button type="submit" value="" class="btn btn-default">GUARDAR</button>
                                        <button type="reset" value="" class="btn btn-default">LIMPIAR</button>
                                        <br/>
                                        <?php if (isset($errores['error'])){?><p class="panel panel-red"> <?php echo $errores['error'];}else{ echo "";} ?> <br/></p>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-group">
                          <?php foreach ($resultados as $key => $value) {?>
                            <li class="list-group-item"><?php echo $value['destino_gasto']; ?></li>
                          <?php } ?>

                        </ul>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>



                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  <?php include "pie.php" ?>
