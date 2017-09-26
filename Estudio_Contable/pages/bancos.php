<!DOCTYPE html>
<html lang="es">
<?php include "meta.php" ?>
<body>

    <div id="wrapper">

      <?php include "nav.php" ?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">FORMULARIO</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            FORMULARIO DE ALTA
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>ALTA DE BANCO</label>
                                            <input class="form-control" placeholder="nombre del banco">
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
                                        <div class="form-group">
                                            <label>BANCOS DADOS DE ALTA</label>
                                            <select class="form-control">
                                                <option></option>
                                                <option>SANTANDER RIO</option>
                                                <option>GALICIA</option>
                                                <option>HSBC</option>
                                                <option>CIUDAD</option>
                                                <option>PATAGONIA</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-default">GUARDAR</button>
                                        <button type="reset" class="btn btn-default">LIMPIAR</button>
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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  <?php include "pie.php" ?>
