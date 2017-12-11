<?php
$dsn = 'mysql:host=localhost;dbname=prueba';
$nombre_usuario = 'debian-sys-maint';
$contraseña = 'si3kl4VBU4MrsyXZ';
$db = new PDO($dsn, $nombre_usuario, $contraseña, $opciones);

$result = $db->query("SELECT * FROM Ciudades
                    WHERE Paises_Codigo = '".$_GET['c']."'
                    ORDER BY Ciudad ASC");
$provincias = $result->fetchAll();

if(!empty($provincias)) {

    if(!empty($_GET['format']) && $_GET['format'] == 'json') {
      //TO DO - print JSON
    } else {
    echo "<select name='provincia' id='provincia'>";
      echo "<option value=0>Seleccione provincia</option>";
      foreach($provincias as $p) {
        echo "<option value='".$p['idCiudades']."'>".$p['Ciudad']."</option>";
      }
    echo "</select>";
  }
} else {
  echo "No se encontraron ciudades";
}
?>
