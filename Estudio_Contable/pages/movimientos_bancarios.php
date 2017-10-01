<?php
include "../metas/funciones.php";
$conexion= conexion();
$resultados =tabla('movimientos');

$movimiento= isset ($_POST['movimiento'])? $_POST['movimiento'] : null;

if ($_POST) {
    $errores= array();
    if (empty($movimiento)){
      $errores['error']= '** Por favor rellenar el campo BANCO';
    }
    if (count($errores)==0){
      insertar_movimientos_bancarios($movimiento);
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
                    <h1 class="page-header">MOVIMIENTOS BANCARIOS</h1>
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
                                    <form action="movimientos_bancarios.php" method="post" role="form">
                                        <div class="form-group">
                                            <label>ALTA MOVIMIENTO</label>
                                            <input name="movimiento" class="form-control" placeholder="transaccion">
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
                            <li class="list-group-item"><?php echo $value['movimientos_nombre']; ?></li>
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
