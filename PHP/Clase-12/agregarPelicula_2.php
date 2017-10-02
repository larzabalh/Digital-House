<?php
include "funciones.php";
$conexion= conexion();


$titulo= isset ($_POST['titulo'])? $_POST['titulo'] : null;
$rating= isset ($_POST['rating'])? $_POST['rating'] : null;
$premios= isset ($_POST['premios'])? $_POST['premios'] : null;
$duracion= isset ($_POST['duracion'])? $_POST['duracion'] : null;
$estreno= isset ($_POST['anio'])? ($_POST['mes'].'-'.$_POST['dia'].'-'.$_POST['dia']):null;


if (isset($_POST['insertar'])) {
      $salida =buscar($titulo);
      if ($salida==1) {
          echo "La Peli ya existe, tenes que cargar otra...";

          
      }else {
      insertar($titulo,$rating,$premios,$duracion,$estreno);
            }
      }



 ?>

<html>
    <head>
        <title>Agregar Pelicula</title>
    </head>
    <body>
        <form id="agregarPelicula" name="agregarPelicula" method="POST">
            <div>
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo"/>
            </div>
            <div>
                <label for="rating">Rating</label>
                <input type="text" name="rating" id="rating"/>
            </div>
            <div>
                <label for="premios">Premios</label>
                <input type="text" name="premios" id="premios"/>
            </div>
            <div>
                <label for="duracion">Duracion</label>
                <input type="text" name="duracion" id="duracion"/>
            </div>
            <div>
                <label>Fecha de Estreno</label>
                <select name="dia">
                    <option value="">Dia</option>
                    <?php for ($i=1; $i < 32; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <select name="mes">
                    <option value="">Mes</option>
                    <?php for ($i=1; $i < 13; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <select name="anio">
                    <option value="">Anio</option>
                    <?php for ($i=1900; $i < 2017; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" value="Agregar Pelicula" name="insertar"/>
            <input type="submit" value="BUSCAR" name="buscar"/>
        </form>
    </body>
</html>
