<?php
include "../metas/funciones.php";
$conexion= conexion();
$resultados =tabla('medio_de_pago');
$tabla = datos_nombre_gasto();

$medio_pago_id= isset ($_POST['tipo_gasto'])? $_POST['tipo_gasto'] : null;
$nombre_gasto= isset ($_POST['nombre_gasto'])? $_POST['nombre_gasto'] : null;

if ($_POST) {

    $errores= array();
    if (empty($nombre_gasto)){
      $errores['error']= '** Por favor rellenar el campo CUENTA BANCARIA';
    }
    if (count($errores)==0){
        insertar_nombre_gasto($nombre_gasto,$medio_pago_id,$usuario=1);
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
                                    <form action="nombre_del_gasto.php" method="post" role="form">
                                      <div class="form-group">
                                          <label>TIPO DE GASTO</label>
                                          <select class="" name="tipo_gasto">
                                            <?php foreach ($resultados as $key => $value) {?>
                                              <option value="<?php echo $value['idmedio_de_pago'] ?>"><?php echo $value['forma_de_pago']; ?></option>
                                            <?php } ?>
                                          </select>
                                      </div>
                                        <div class="form-group">
                                            <label>NOMBRE DEL GASTO</label>
                                            <input name="nombre_gasto" class="form-control" placeholder="alta de cuenta">
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
                          <th>GASTO</th>
                          <th>PAGO</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($tabla as $key => $value) {?>
                        <tr>
                          <td><?php echo $value['nombre_gasto']; ?></td>
                          <td><?php echo $value['medio'];?></td>
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
