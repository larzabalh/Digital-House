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
                <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Registrar Gasto <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                            <select id="periodo" onchange="listar_periodo()" name="periodo" class="form-control selectpicker" data-live-search="true" required></select>
                            <div class="" id="valor"></div>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Registrar Gasto <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>

                        <div class="box-title" id="jose">
                          TOTAL SUELDO JOSE LUIS:
                        </div>
                        <div class="box-tools pull-right">
                            <select id="periodo" onchange="listar_periodo()" name="periodo" class="form-control selectpicker" data-live-search="true" required></select>
                            <div class="" id="valor"></div>
                        </div>
                    </div>
                  </div>
                </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Periodo</th>
                            <th>Fecha</th>
                            <th>Importe</th>
                            <th>Saldo</th>
                            <th>Nombre</th>
                            <th>Tipo Gasto</th>
                            <th>Forma de Pago</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Periodo</th>
                            <th>Fecha</th>
                            <th>Importe</th>
                            <th>Saldo</th>
                            <th>Nombre</th>
                            <th>Tipo Gasto</th>
                            <th>Forma de Pago</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>

                    <!-- esto que sigue aca es el formulario del evento cargar!!! -->
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="idregistro_gasto" id="idregistro_gasto">
                            <label>Fecha:</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Importe:</label>
                            <input type="number" class="form-control" name="importe" id="importe" maxlength="100" placeholder="1000" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Gasto(*):</label>
                            <select id="nombre" name="nombre" onchange="recargar_forma_pago()" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Gasto:</label>
                            <select id="tipo_gasto" name="tipo_gasto" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Medio de Pago:</label>
                            <select id="forma_de_pago" name="forma_de_pago" class="form-control selectpicker" data-live-search="true" required></select>
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
<script type="text/javascript" src="scripts/registro_gasto.js"></script>
