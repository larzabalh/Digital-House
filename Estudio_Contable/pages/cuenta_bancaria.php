<?php
include "../metas/funciones.php";
$conexion= conexion();
$resultados =tabla('bancos');
$tabla = banco_cuenta();

$banco= isset ($_POST['banco'])? $_POST['banco'] : null;
$cuenta= isset ($_POST['cuenta'])? $_POST['cuenta'] : null;

if ($_POST) {

    $errores= array();
    if (empty($cuenta)){
      $errores['error']= '** Por favor rellenar el campo CUENTA BANCARIA';
    }
    if (count($errores)==0){
      $salida=insertar_cuenta($banco,$cuenta,$usuario=1);
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
                <div class="col-lg-6">
                    <h1 class="page-header">ALTA</h1>
                </div>
                <div class="col-lg-6">
                    <h1 class="page-header">REGISTRADOS</h1>
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
                                    <form action="cuenta_bancaria.php" method="post" role="form">
                                      <div class="form-group">
                                          <label>SELECCIONAR EL BANCO</label>
                                          <select class="" name="banco">
                                            <?php foreach ($resultados as $key => $value) {?>
                                              <option value="<?php echo $value['idbancos'] ?>"><?php echo $value['banco_nombre']; ?></option>
                                            <?php } ?>
                                          </select>
                                      </div>
                                        <div class="form-group">
                                            <label>NUMERO DE CUENTA</label>
                                            <input name="cuenta" class="form-control" placeholder="alta de cuenta">
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
                <div class="col-lg-6">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>BANCO</th>
                          <th>CUENTA</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($tabla as $key => $value) {?>
                        <tr>
                          <td><?php echo $value['BANCO']; ?></td>
                          <td><?php echo $value['CUENTA_BANCARIA'];?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                </div>
                  <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  <?php include "pie.php" ?>
