<?php
$dsn = 'mysql:host=localhost;dbname=prueba';
$nombre_usuario = 'debian-sys-maint';
$contraseña = 'si3kl4VBU4MrsyXZ';
$db = new PDO($dsn, $nombre_usuario, $contraseña, $opciones);

$result = $db->query("SELECT * FROM Paises
                    WHERE Pais LIKE '%".$_GET['q']."%'");
$paises = $result->fetchAll();

if(!empty($paises)) {

  foreach($paises as $p) {
    echo "<li class='lipais' data-pid='".$p['Codigo']."'>".$p['Pais']."</li>";
  }

} else {
  echo "";
}
?>
