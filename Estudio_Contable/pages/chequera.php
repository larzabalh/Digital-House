<?php
include "../metas/funciones.php";
$conexion= conexion();
$resultados =tabla('cuentas_bancaria');
$tabla = datos_chequera();

$cuenta= isset ($_POST['cuenta'])? $_POST['cuenta'] : null;
$numero_chequera= isset ($_POST['numero_chequera'])? $_POST['numero_chequera'] : null;
$cantidad_cheques= isset ($_POST['cantidad_cheques'])? $_POST['cantidad_cheques'] : null;
$desde= isset ($_POST['desde'])? $_POST['desde'] : null;
$hasta= isset ($_POST['hasta'])? $_POST['hasta'] : null;

if ($_POST) {
// echo $cuenta.$numero_chequera.$cantidad_cheques.$desde.$hasta;

    $errores= array();
    if (empty($numero_chequera)){
      $errores['error']= '** Por favor rellenar el campo CUENTA BANCARIA';
    }
    if (count($errores)==0){
      $salida=insertar_chequera($numero_chequera,$cantidad_cheques,$desde,$hasta,$cuenta,$usuario=1);
      echo $salida;
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
                <div class="col-lg-12">
                    <h1 class="page-header">ALTA</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            FORMULARIO DE ALTA
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form action="chequera.php" method="post" role="form">
                                        <div class="form-group col-xs-4">
                                            <label>CUENTA BANCARIA</label>
                                            <select class="" name="cuenta">
                                              <?php foreach ($resultados as $key => $value) {?>
                                                <option value="<?php echo $value['idcuentas_bancaria'] ?>"><?php echo $value['num_cuenta']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-4">
                                              <label>Nº CHEQUERA</label>
                                              <input type="number" name="numero_chequera" class="form-control" placeholder="chequera numero">
                                        </div>
                                        <div class="form-group col-xs-4">
                                              <label>CANT. CHEQUES</label>
                                              <input type="number" name="cantidad_cheques" class="form-control" placeholder="25">
                                        </div>
                          </div>
                          <div class="row">
                                      <div class="form-group col-xs-4">
                                            <label>DESDE</label>
                                            <input type="number" name="desde" class="form-control" placeholder="1">
                                      </div>
                                      <div class="form-group col-xs-4">
                                            <label>HASTA</label>
                                            <input type="number" name="hasta" class="form-control" placeholder="25">
                                      </div>

                            </div>
                            <div class="row">
                                      <button type="submit" value="" class="btn btn-default">GUARDAR</button>
                                      <button type="reset" value="" class="btn btn-default">LIMPIAR</button>
                                      <?php if (isset($errores['error'])){?><p class="panel panel-red"> <?php echo $errores['error'];}else{ echo "";} ?> <br/></p>
                                      </form>
                            </div>
                                <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>BANCO</th>
                          <th>CUENTA</th>
                          <th>CHEQUERA Nº</th>
                          <th>CANT. CHs</th>
                          <th>DESDE</th>
                          <th>HASTA</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($tabla as $key => $value) {?>
                        <tr>
                          <td><?php echo $value['BANCO']; ?></td>
                          <td><?php echo $value['CUENTA_BANCARIA'];?></td>
                          <td><?php echo $value['CHEQUERA_NUMERO'];?></td>
                          <td><?php echo $value['CANT_CH'];?></td>
                          <td><?php echo $value['DESDE'];?></td>
                          <td><?php echo $value['HASTA'];?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                </div>
              </div>
                  <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  <?php include "pie.php" ?>
