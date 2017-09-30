<?php
require_once 'funciones.php';



if (isset($_SESSION['login'])){
  header('Location: perfil.php');
}
$usuario= isset ($_POST['usuario'])? $_POST['usuario'] : null;
$clave= isset ($_POST['clave'])? $_POST['clave'] : null;

if ($_POST) {
  $errores= array();
    if (empty ($usuario) or empty($clave)){
      $errores['error']= 'Por favor rellenar todos los campos correctamente';
    }else {
      $conexion= conexion();
      $sql = "SELECT * from usuarios where nombre = '$usuario' limit 1)";
      $query= $conexion->prepare($sql);
      $query -> execute (array(':nombre'=>$usuario));
      $resultado = $query->fetch();

      var_dump($resultado);
    }

    // if (count($errores)==0){
    //   session_start();
    //
    //
    //
    //
    //   $_SESSION['login']="ok";
    //   $_SESSION['usuario']=$linea['usuario'];
    //   header('Location: ingresos.php');
    // }

}
 ?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Oswald" rel="stylesheet">
    <title>Mis Finanzas - Argentina</title>
  </head>
  <body>
    <div class="container">
      <div class="background1">
      <?php include('header/header.html');?>
      </div>
      <section class="section1">
        <div>
          <h2 class="bounceInLeft animated">Administra tus finanzas</h2>
          <h3><spam class="animation1 bounceInLeft animated">Fácil. </spam><spam class="bounceInLeft animated animation2">Rápido.</spam><spam class="bounceInLeft animated animation3"> Gratis.</spam></h3>
        </div>
        <div class="formularioIndex fadeInDown animated">
          <p>Inicia Sesion</p>
          <form class="logIn" action="index.php" method="post">
            <div>
              <label for="usuario">Nombre de Usuario</label>
              <br>
              <input id="usuario" type="text" name="usuario" value='<?php echo $usuario ?>'>
              <br>
              <br/>
              <label for="clave">Contraseña</label>
              <br>
              <input id="clave" type="password" name="clave" value="">
              <br/>
              <?php if (isset($errores['error'])){echo '<p class="error">'.$errores['error']."</p>";}elseif(isset($errores['usuario_error'])){echo '<p class="error">'.$errores['usuario_error']."</p>";}else{ echo "";}  ?>

            </div>
            <input id="recordarme" type="checkbox" name="recordarme" value="yes">
            <label for="recordarme">Recordarme</label>
            <br>
            <button type="submit" name="enviar" value="">Iniciar</button>
            <br>
            <a href="#">¿Has olvidado tu contraseña?</a>
            <br>
            <a href="registrate.php">¿No estás registrado? Crea tu cuenta.</a>
          </form>
        </div>

      </section>
    </div>
    <section id="queSomos" class="indexParte2">
      <div>
        <h2>¿Quiénes somos?</h2>
        <br>
        <br>
        <p>Somos un grupo de contadores especializados con las herramientas</p>
        <p>para brindarte la solucion a tus problemas financieros.</p>
        <p> Nuestra especialidad es otorgar de forma eficaz y rápida la ayuda que necesites </p>
        <p> para que lleves tus finanzas a su máximo potencial. </p>
        <br>
        <p> Mis Finanzas Accounting Group , Always by your side.</p>
      </div>
    </section>
    <section class="indexParte3">
      <div>
        <h2>Beneficios</h2>
        <ul>
          <li><img src="images/stopwatch.svg" alt="" width="60px"><span>ACCESIBILIDAD</span>  Disponibilidad del servicio las 24 horas</li>
          <li><img src="images/teamwork.svg" alt="" width="60px"><span>ASISTENCIA</span>  Contacto con personas dedicadas al rubro</li>
          <li><img src="images/group.svg" alt="" width="60px"><span>ATENCIÓN</span>  Soporte técnico por expertos</li>
        </ul>
      </div>
    </section>
    <?php include('footer/footer.html') ?>

  </body>
</html>
