<?php
include "../metas/funciones.php";
$conexion= conexion();
$gasto =tabla('gasto');
$tipo_gasto =tabla('tipo_gasto');
$cuotas =tabla('cuotas');
$t_medio_de_pago=tabla('medio_de_pago');
$tabla = datos_registros_gastos();

$fecha= isset ($_POST['fecha'])? $_POST['fecha'] : null;
$nombre_gasto_id= isset ($_POST['nombre_gasto_id'])? $_POST['nombre_gasto_id'] : null;
$importe= isset ($_POST['importe'])? $_POST['importe'] : null;
$tipo_gasto_id= isset ($_POST['tipo_gasto_id'])? $_POST['tipo_gasto_id'] : null;
$medio_pago_id= isset ($_POST['medio_pago_id'])? $_POST['medio_pago_id'] : null;
$cuotas_id= isset ($_POST['cuotas_id'])? $_POST['cuotas_id'] : null;
$pagado= isset ($_POST['pagado'])? $_POST['pagado'] : null;

if ($_POST) {
// echo $cuenta.$numero_chequera.$cantidad_cheques.$desde.$hasta;

    $errores= array();
    if (empty($fecha)){
      $errores['error']= '** Por favor rellenar el campo CUENTA BANCARIA';
    }
    if (count($errores)==0){
      insertar_registro_gasto($fecha,$nombre_gasto_id,$importe,$tipo_gasto_id,$medio_pago_id,$cuotas_id,$pagado,$usuario=1);
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
                                    <form action="registro_gastos.php" method="post" role="form">
                                        <div class="form-group col-xs-4">
                                              <label>FECHA</label>
                                              <input type="date" name="fecha" class="form-control" placeholder="30/12/1980">
                                        </div>
                                        <div class="form-group col-xs-4">
                                            <label>GASTO</label>
                                            <select class="" name="nombre_gasto_id">
                                              <?php foreach ($gasto as $key => $value) {?>
                                                <option value="<?php echo $value['idgasto'] ?>"><?php echo $value['nombre_gasto']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-4">
                                              <label>IMPORTE</label>
                                              <input type="number" name="importe" class="form-control" placeholder="1000">
                                        </div>
                          </div>
                          <div class="row">
                                      <div class="form-group col-xs-4">
                                          <label>TIPO DEL GASTO</label>
                                          <select class="" name="tipo_gasto_id">
                                            <?php foreach ($tipo_gasto as $key => $value) {?>
                                              <option value="<?php echo $value['idtipo_gasto'] ?>"><?php echo $value['destino_gasto']; ?></option>
                                            <?php } ?>
                                          </select>
                                      </div>
                                      <div class="form-group col-xs-4">
                                          <label>MEDIO DE PAGO</label>
                                          <select class="" name="medio_pago_id">
                                            <?php foreach ($t_medio_de_pago as $key => $value) {?>
                                              <option value="<?php echo $value['idmedio_de_pago'] ?>"><?php echo $value['forma_de_pago']; ?></option>
                                            <?php } ?>
                                          </select>
                                      </div>

                                      <div class="form-group col-xs-4">
                                          <label>CUOTAS</label>
                                          <select class="" name="cuotas_id">
                                            <?php foreach ($cuotas as $key => $value) {?>
                                              <option value="<?php echo $value['idcuotas'] ?>"><?php echo $value['numero_cuotas']; ?></option>
                                            <?php } ?>
                                          </select>
                                      </div>
                            </div>
                            <div class="row">
                                        <div class="form-group col-xs-4">
                                          <label>PAGADO?</label>
                                          <label class="checkbox-inline">
                                              <input type="radio" name="pagado" value="1">SI
                                          </label>
                                          <label class="checkbox-inline">
                                              <input type="radio" name="pagado" value="0">NO
                                          </label>
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
                          <th>FECHA</th>
                          <th>IMPORTE</th>
                          <th>GASTO</th>
                          <th>TIPO DE GASTO</th>
                          <th>FORMA PAGO</th>
                          <th>CUOTAS</th>
                          <th>PAGADO</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($tabla as $key => $value) {?>
                        <tr>
                          <td><?php echo $value['fecha'];?></td>
                          <td><?php echo $value['importe'];?></td>
                          <td><?php echo $value['nombre_gasto'];?></td>
                          <td><?php echo $value['destino_gasto'];?></td>
                          <td><?php echo $value['forma_de_pago'];?></td>
                          <td><?php echo $value['cuotas'];?></td>
                          <td><?php echo $value['pagado'];?></td>
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
