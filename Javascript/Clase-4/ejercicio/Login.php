<?php

  $usuario = 'admin';
  $clave = '1234';
  $errores = [];

  if ($_POST) {
    // sleep(3);
    if ($_POST['usuario'] == $usuario && $_POST['clave'] == $clave) {
      header('Location: bienvenida.php');
    } else {
      if ($_POST['usuario'] != $usuario) {
        $errores['usuario'] = "El usuario es incorrecto";
      }
      if ($_POST['clave'] != $clave) {
        $errores['clave'] = "La clave es incorrecta";
      }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>

  <div class="container">

    <form method="post" id="form">
      <div class="form-group <?php echo isset($errores['usuario']) ? 'has-error' : '' ?>">
        <label class="control-label">Usuario</label>

        <input id="usuario" type="text" name="usuario" class="form-control" value="<?php echo $_POST ? $_POST['usuario'] : '' ?>">

        <p class="help-block" id="error-usuario"></p>


      </div>
      <div class="form-group <?php echo isset($errores['clave']) ? 'has-error' : '' ?>">
        <label class="control-label">Clave</label>
        <input id="clave" type="password" name="clave" class="form-control" value="<?php echo $_POST ? $_POST['clave'] : '' ?>">
        <p class="help-block" id="error-clave"></p>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
<script src="script.js" charset="utf-8"></script>

</body>
</html>
