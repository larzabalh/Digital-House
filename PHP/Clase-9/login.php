<?php

require_once 'funciones.php';


$email= isset ($_POST['email'])? $_POST['email'] : null;
$clave= isset ($_POST['clave'])? $_POST['clave'] : null;
$recordarme = isset ($_POST['clave'])? $_POST['clave'] : null;

$errores= array();
if ($_POST) {

    if (!requerido($email)){
      $errores['email']="el campo email es requerido";
    }

    if (!requerido($clave)){
      $errores['clave']="el campo clave es requerido";
    }

//busco el mail en la BD y si es true, digo que el usuario existe
//var_dump(buscar_mail($email));
// $user = buscar...
// if($user)
        if (!buscar_usuario($email,$clave)) {
            $errores['error']="hay un error";

            //var_dump($errores['no_existe_mail']);
            //header('Location: register.php');
        }



    // if (!buscar_mail($email)) {
    //     $errores['no_existe_mail']="El email no existe en la BD";
    //     //var_dump($errores['no_existe_mail']);
    //     //header('Location: register.php');
    // }
    // if (!buscar_clave($clave)) {
    //     $errores['clave_distintas']="CLAVE INCORRECTA";
    //     //var_dump($errores['clave_distintas']);
    //     //header('Location: register.php');
    // }

$linea = buscar_usuario($email,$clave);

    var_dump($errores);
    //die;
    if (count($errores)==0 && $linea){
       session_start();
       $_SESSION['usuario']=$linea['usuario'];
       $_SESSION['email']=$linea['email'];
       $_SESSION['clave2']=$linea['clave2'];

        header('Location: validado.php');

    }

}


 ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Contact us</title>
</head>
<body>

    <div id='fg_membersite'>
        <form id='register' action='login.php' method='post'>
            <fieldset >
                <legend>Registrate</legend>

                <input type='hidden' name='submitted' id='submitted' value='1'/>
                <div><span class='error'></span></div>

                <div class='container'>
                    <label for='email' >Email:</label><br/>
                    <input type='text' name='email' id='email' value='<?php echo $email ?>' maxlength="50" />
                    <?php if (isset($errores['email'])){echo $errores['email'];}else{ echo "";} ?>
                    <?php if (isset($errores['no_existe_mail'])){echo $errores['no_existe_mail'];}else{ echo "";} ?>

                    <br/>
                    <span id='register_email_errorloc' class='error'></span>
                </div>

                <div class='container' style='height:80px;'>
                    <label for='clave' >Contraseña*:</label><br/>
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <input type='password' name='clave' id='clave' maxlength="50" />
                    <?php if (isset($errores['clave_distintas'])){echo $errores['clave_distintas'];}else{ echo "";} ?><br/>
                    <div id='register_password_errorloc' class='error' style='clear:both'></div>
                </div>

                <input type="checkbox" name="recordarme" value="1">RECORDARME

                <div class='container'>
                    <input type='submit' name='Submit' value='Enviar' />
                </div>

                <!--ESTO ES PARA QUE APAREZCA EL REGISTRARSE SI EL USUARIO NO ESTA EN LA BASE DE DATOS    -->
                <?php if (isset($errores['no_existe_mail'])) {?>
                  <div class='container'>
                      <a href="register.php">REGISTRARSE</a>
                  </div>

                <?php } ?>



            </fieldset>
        </form>

    </body>
</html>
