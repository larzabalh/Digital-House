<?PHP
function existe ($archivo){

if (file_exists($archivo)){
  $recurso=fopen ($archivo,'a+');
  }
  else {
  $recurso=fopen ($archivo,'w+');
  }
  return $recurso;
}

//

echo "Esto es el POST<br>";
var_dump($_POST);
unset($_POST['submitted']);
unset($_POST['Submit']);
$json=$_POST;
echo "<br>";
echo "Esto es la variable JSON<br>";
var_dump($json);
echo "<br>";
echo "Lo que sigue seria el STRING DEL JSON<br>";
$escribo=json_encode ($json);
var_dump($escribo);


$recurso= existe ("bd.json");
$archivo = "bd.json";
$escribo = $escribo."\n";
fwrite ($recurso,$escribo);

//el put contents, pisa toda la informacion que tenga del archivo, la escribe pero la pisa!!!
// $lectura = file_put_contents($archivo,"");

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

                <div class='short_explanation'>* campos requeridos</div>
                <input type='text' class='spmhidip' name='' />

                <div><span class='error'></span></div>
                <div class='container'>
                    <label for='name' >Nombre completo: </label><br/>
                    <input type='text' name='name' id='name' value='' maxlength="50" /><br/>
                    <span id='register_name_errorloc' class='error'></span>
                </div>
                <div class='container'>
                    <label for='email' >Email:</label><br/>
                    <input type='text' name='email' id='email' value='' maxlength="50" /><br/>
                    <span id='register_email_errorloc' class='error'></span>
                </div>
                <div class='container'>
                    <label for='username' >Nombre de usuario*:</label><br/>
                    <input type='text' name='username' id='username' value='' maxlength="50" /><br/>
                    <span id='register_username_errorloc' class='error'></span>
                </div>
                <div class='container' style='height:80px;'>
                    <label for='password' >Contaseña*:</label><br/>
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <input type='password' name='password' id='password' maxlength="50" />
                    <div id='register_password_errorloc' class='error' style='clear:both'></div>
                </div>

                <div class='container'>
                    <input type='submit' name='Submit' value='Enviar' />
                </div>

            </fieldset>
        </form>

    </body>
</html>
