<?php
include "../metas/funciones.php";
$conexion= conexion();
$t_cuenta_bancaria =tabla('cuentas_bancaria');
$t_usuario_tarjeta =tabla('usuarios_tarjetas');
$t_movimientos =tabla('movimientos');
$t_medio_de_pago=tabla('medio_de_pago');
$tabla = datos_tarjetas();

$nombre_tarjeta= isset ($_POST['nombre_tarjeta'])? $_POST['nombre_tarjeta'] : null;
$dia_del_debito= isset ($_POST['dia_del_debito'])? $_POST['dia_del_debito'] : null;
$medio_de_pago_id= isset ($_POST['medio_de_pago_id'])? $_POST['medio_de_pago_id'] : null;
$limite= isset ($_POST['limite'])? $_POST['limite'] : null;
$cuenta_bancaria_id= isset ($_POST['cuenta_bancaria_id'])? $_POST['cuenta_bancaria_id'] : null;
$movimiento_bancario_id= isset ($_POST['movimiento_bancario_id'])? $_POST['movimiento_bancario_id'] : null;
$usuario_tarjeta_id= isset ($_POST['usuario_tarjeta_id'])? $_POST['usuario_tarjeta_id'] : null;

if ($_POST) {
// echo $cuenta.$numero_chequera.$cantidad_cheques.$desde.$hasta;

    $errores= array();
    if (empty($nombre_tarjeta)){
      $errores['error']= '** Por favor rellenar el campo CUENTA BANCARIA';
    }
    if (count($errores)==0){
      $salida=insertar_tarjeta($nombre_tarjeta,$dia_del_debito,$medio_de_pago_id,$limite,$cuenta_bancaria_id,$movimiento_bancario_id,$usuario_tarjeta_id,$usuario=1);
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
                                    <form action="tarjetas.php" method="post" role="form">
                                        <div class="form-group col-xs-4">
                                            <label>CUENTA BANCARIA</label>
                                            <select class="" name="cuenta_bancaria_id">
                                              <?php foreach ($t_cuenta_bancaria as $key => $value) {?>
                                                <option value="<?php echo $value['idcuentas_bancaria'] ?>"><?php echo $value['num_cuenta']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-4">
                                            <label>RESPONSABLE</label>
                                            <select class="" name="usuario_tarjeta_id">
                                              <?php foreach ($t_usuario_tarjeta as $key => $value) {?>
                                                <option value="<?php echo $value['idusuarios_tarjetas'] ?>"><?php echo $value['usuarios_tarjeta']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-4">
                                            <label>MOVIMIENTO</label>
                                            <select class="" name="movimiento_bancario_id">
                                              <?php foreach ($t_movimientos as $key => $value) {?>
                                                <option value="<?php echo $value['idmovimientos_bancarios'] ?>"><?php echo $value['movimientos_nombre']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>

                          </div>
                          <div class="row">
                                      <div class="form-group col-xs-4">
                                            <label>NOMBRE TARJETA</label>
                                            <input type="text" name="nombre_tarjeta" class="form-control" placeholder="1">
                                      </div>
                                      <div class="form-group col-xs-4">
                                            <label>DIA DEL PAGO</label>
                                            <input type="number" name="dia_del_debito" class="form-control" placeholder="25">
                                      </div>
                                      <div class="form-group col-xs-4">
                                          <label>PAGO</label>
                                          <select class="" name="medio_de_pago_id">
                                            <?php foreach ($t_medio_de_pago as $key => $value) {?>
                                              <option value="<?php echo $value['idmedio_de_pago'] ?>"><?php echo $value['forma_de_pago']; ?></option>
                                            <?php } ?>
                                          </select>
                                      </div>
                            </div>
                            <div class="row">
                                        <div class="form-group col-xs-4">
                                              <label>LIMITE</label>
                                              <input type="number" name="limite" class="form-control" placeholder="50000">
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
                          <th>TARJETA</th>
                          <th>USUARIO TARJETA</th>
                          <th>PAGO</th>
                          <th>LIMITE</th>
                          <th>DIA DEB.</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($tabla as $key => $value) {?>
                        <tr>
                          <td><?php echo $value['banco'];?></td>
                          <td><?php echo $value['num_cuenta'];?></td>
                          <td><?php echo $value['tarjeta'];?></td>
                          <td><?php echo $value['usuarios_tarjeta'];?></td>
                          <td><?php echo $value['forma_de_pago'];?></td>
                          <td><?php echo $value['limite'];?></td>
                          <td><?php echo $value['dia_del_debito'];?></td>
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
