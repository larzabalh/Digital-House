<?php
include "../metas/funciones.php";
$conexion= conexion();
$resultados =tabla('cuentas_bancaria');
// $tabla = datos_registros_gastos();

$cuenta= isset ($_POST['cuenta'])? $_POST['cuenta'] : null;
$numero_chequera= isset ($_POST['numero_chequera'])? $_POST['numero_chequera'] : null;
$cantidad_cheques= isset ($_POST['cantidad_cheques'])? $_POST['cantidad_cheques'] : null;
$desde= isset ($_POST['desde'])? $_POST['desde'] : null;
$hasta= isset ($_POST['hasta'])? $_POST['hasta'] : null;
$periodo= isset ($_POST['periodo'])? $_POST['periodo'] : null;

if ($_POST['buscar']) {
// echo $cuenta.$numero_chequera.$cantidad_cheques.$desde.$hasta;

    $errores= array();
    if (empty($numero_chequera)){
      $errores['error']= '** Por favor rellenar el campo CUENTA BANCARIA';
    }
    if (count($errores)==0){
      $tabla = datos_registros_gastos_por_periodo($_POST['periodo']);
      var_dump($tabla);
      }
    }
$tabla = datos_registros_gastos_por_periodo($periodo.'%');

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
                            TOTAL DE GASTOS $<?php echo sumar_gastos(); ?>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>TOTAL GASTOS</th>
                          <th>GASTOS PAGADOS</th>
                          <th>FALTAN PAGAR</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>$<?php echo sumar_gastos(); ?></td>
                          <td>$<?php echo datos_registros_gastos_pagados(1);?></td>
                          <td>$<?php echo datos_registros_gastos_pagados(0);?></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-8">

                    <form action="vista_gastos_totales.php" method="post" role="form">
                    <div class="form-group col-xs-4">
                      <select class="form-control selectpicker col-lg-2"data-live-search="true" name="periodo">
                        <?php $periodo =periodo();
                        foreach ($periodo as $key => $value) {?>
                          <option value="<?php echo $value['idperiodo'] ?>"><?php echo $value['periodo']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-xs-4">
                      <input class="form-control"type="submit" name="buscar" value="BUSCAR">
                    </div>
                    </form>

                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>PERIODO</th>
                          <th>GASTOS PAGADOS POR PERIODO</th>
                          <th>FALTAN PAGAR POR PERIODO</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $acumulado =0 ?>
                        <?php foreach ($tabla as $key => $value) {?>
                        <tr>
                          <td><?php echo $value['periodo'];?></td>
                          <td><?php echo $value['nombre_gasto'];?></td>
                          <td><?php echo formato_moneda($value['importe'],2,',','.');?></td>
                          <td><?php echo formato_moneda($acumulado  += $value['importe']); ?></td>
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
