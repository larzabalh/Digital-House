<?php
require 'header.php';

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Cuenta Bancaria <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Importe</th>
                            <th>Gasto</th>
                            <th>Tipo de Gasto</th>
                            <th>Forma de Pago</th>
                            <th>Cuotas</th>
                            <th>Pagado</th>
                            <th>Condicion</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Importe</th>
                            <th>Gasto</th>
                            <th>Tipo de Gasto</th>
                            <th>Forma de Pago</th>
                            <th>Cuotas</th>
                            <th>Pagado</th>
                            <th>Condicion</th>
                          </tfoot>
                        </table>
                    </div>

                    <!-- esto que sigue aca es el formulario del evento cargar!!! -->
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="idregistro_gasto" id="idregistro_gasto">
                            <label>Fecha(*):</label>
                            <input type="date" class="form-control" name="fecha_hora" id="fecha_hora" required="">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Gasto(*):</label>
                            <select id="nombre_gasto_id" name="nombre_gasto_id" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Importe:</label>
                            <input type="text" class="form-control" name="importe" id="importe" maxlength="100" placeholder="Importe" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Gasto(*):</label>
                            <select id="tipo_gasto_id" name="tipo_gasto_id" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Medio de Pago(*):</label>
                            <select id="medio_pago_id" name="medio_pago_id" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cuotas(*):</label>
                            <select id="cuotas_id" name="cuotas_id" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            aca va el radio button!!!
                          </div>


                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/cuenta_bancaria.js"></script>
