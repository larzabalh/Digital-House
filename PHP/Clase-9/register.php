<?php

require_once 'funciones.php';

$nombre= isset ($_POST['nombre'])? $_POST['nombre'] : null;
$email= isset ($_POST['email'])? $_POST['email'] : null;
$usuario= isset ($_POST['usuario'])? $_POST['usuario'] : null;
$clave= isset ($_POST['clave'])? $_POST['clave'] : null;
$clave2= isset ($_POST['clave2'])? $_POST['clave2'] : null;


$errores= array();
if ($_POST) {
    if (!requerido($nombre)){
      $errores['nombre']="el campo nombre es requerido";
    }
    if (!requerido($email)){
      $errores['email']="el campo email es requerido";
    }
    if (!requerido($usuario)){
      $errores['usuario']="el campo usuario es requerido";
    }
    if (!requerido($clave)){
      $errores['clave']="el campo clave es requerido";
    }
    if (!requerido($clave2)){
      $errores['clave2']="el campo Repetir Contraseña es requerido";
    }

    if ($clave !==$clave2) {
      $errores['claves_distintas']="Las contraseñas no son iguales";
    }

    if (!validar_mail($email)) {
      $errores['email_no_valido']="el email no es valido";
    }



//busco el mail en la BD y si es true, digo que el usuario existe
//var_dump(buscar_mail($email));
    if (buscar_mail($email)) {
        $errores['existe']="el email ya existe en la base de datos!!!";
    }


// $linea = buscar_usuario($email,$clave);
//
// var_dump($linea);



    //var_dump($errores);
    //die;
    if (count($errores)==0){
      guardar($_POST);
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
        <form id='register' action='register.php' method='post'>
            <fieldset >
                <legend>Registrate</legend>

                <input type='hidden' name='submitted' id='submitted' value='1'/>
                <div><span class='error'></span></div>
                <div class='container'>
                    <label for='nombre' >Nombre completo: </label><br/>
                    <input type='text' name='nombre' id='nombre' value='<?php echo $nombre ?>' maxlength="50" />
                    <?php if (isset($errores['nombre'])){echo $errores['nombre'];}else{ echo "";} ?><br/>
                    <span id='register_name_errorloc' class='error'></span>
                </div>
                <div class='container'>
                    <label for='email' >Email:</label><br/>
                    <input type='text' name='email' id='email' value='<?php echo $email ?>' maxlength="50" />
                    <?php if (isset($errores['email'])){echo $errores['email'];}else{ echo "";} ?>
                    <?php if (isset($errores['existe'])){echo $errores['existe'];}else{ echo "";} ?>
                    <?php if (isset($errores['email_no_valido'])){echo $errores['email_no_valido'];}else{ echo "";} ?>

                    <br/>
                    <span id='register_email_errorloc' class='error'></span>
                </div>
                <div class='container'>
                    <label for='usuario' >Nombre de usuario*:</label><br/>
                    <input type='text' name='usuario' id='usuario' value='<?php echo $usuario ?>' maxlength="50" />
                    <?php if (isset($errores['usuario'])){echo $errores['usuario'];}else{ echo "";} ?><br/>
                    <span id='register_username_errorloc' class='error'></span>
                </div>
                <div class='container' style='height:80px;'>
                    <label for='clave' >Contraseña*:</label><br/>
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <input type='password' name='clave' id='clave' maxlength="50" />
                    <?php if (isset($errores['clave'])){echo $errores['clave'];}else{ echo "";} ?><br/>
                    <div id='register_password_errorloc' class='error' style='clear:both'></div>
                </div>
                <div class='container' style='height:80px;'>
                    <label for='clave2' >Repetir Contraseña*:</label><br/>
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <input type='password' name='clave2' id='clave2' maxlength="50" />
                    <?php if (isset($errores['clave2'])){echo $errores['clave2'];}else{ echo "";} ?>
                    <?php if (isset($errores['claves_distintas'])){echo $errores['claves_distintas'];}else{ echo "";} ?>
                    <br/>
                    <div id='register_password_errorloc2' class='error' style='clear:both'></div>
                </div>


                <div class='container'>
                    <input type='submit' name='Submit' value='Enviar' />
                </div>

            </fieldset>
        </form>

    </body>
</html>
