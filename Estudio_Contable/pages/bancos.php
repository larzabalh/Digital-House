<?php
include "../metas/funciones.php";
$conexion= conexion();
$resultados =tabla('bancos');

$banco= isset ($_POST['banco'])? $_POST['banco'] : null;

if ($_POST) {
    $errores= array();
    if (empty($banco)){
      $errores['error']= '** Por favor rellenar el campo BANCO';
    }
    if (count($errores)==0){
      insertar_banco($banco,$usuario=1);
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
                    <h1 class="page-header">BANCOS</h1>
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
                                    <form action="bancos.php" method="post" role="form">
                                        <div class="form-group">
                                            <label>ALTA DE BANCO</label>
                                            <input name="banco" class="form-control" placeholder="nombre del banco">
                                        </div>
                                        <div class="form-group">
                                            <label>HABILITADO</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">SI
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">NO
                                            </label>
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
                        <h2>BANCOS</h2>
                        <ul class="list-group">
                          <?php foreach ($resultados as $key => $value) {?>
                            <li class="list-group-item"><?php echo $value['banco_nombre']; ?></li>
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
