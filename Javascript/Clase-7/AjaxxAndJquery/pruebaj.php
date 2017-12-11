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

  <button id="clickme">Click me</button>
  <button id="clickme2" style="display:none">Ahora a mi </button>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>

  $(function() {

    $('#clickme').on('click', function() {

      $('a').html('aaaa').css('color','blue');

    });

    $('#pais').on('change',function() {
      event.preventDefault();
      var selid = $(this).val();
      if(selid != 0) {
        $.get({
           url: 'http://localhost/php/get_provincias.php?c='+selid,
           success : function(response) {
             $('#provincia_container').html(response);
           }
        });

      }

    });

  });

  </script>

</body>
</html>
