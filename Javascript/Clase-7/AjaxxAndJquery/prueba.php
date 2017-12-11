<html>
<head>
</head>
<body>
<?php
$dsn = 'mysql:host=localhost;dbname=prueba';
$nombre_usuario = 'debian-sys-maint';
$contraseña = 'si3kl4VBU4MrsyXZ';
$db = new PDO($dsn, $nombre_usuario, $contraseña, $opciones);

$result = $db->query("SELECT Codigo,Pais FROM Paises ORDER BY Pais ASC");
$paises = $result->fetchAll();
?>
  <label>Pais:</label>

  <select name="pais" id="pais">
    <option value="0">Seleccione...</option>
    <?php foreach($paises as $p) { ?>
      <option value="<?=$p['Codigo']?>"><?=$p['Pais']?></option>
    <?php } ?>
  </select>

  <div id="provincia_container">
    aqui veras las provincias
  </div>


  <script>
    var selPais = document.getElementById('pais');
    selPais.onchange = function(e) {
      var selid = this.value;
      console.log('Selecciono ' + selid);

      if(selid != 0) {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('provincia_container').innerHTML = xmlhttp.responseText;
          }
        }

        var url = 'http://localhost/php/get_provincias.php?c='+selid;
        xmlhttp.open('GET',url,true);
        xmlhttp.send();

      } else {
        document.getElementById('provincia_container').innerHTML = '';
      }

    }
  </script>
</body>
</html>
