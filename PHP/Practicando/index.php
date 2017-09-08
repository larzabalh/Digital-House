<?php

for ($i=0; $i < 5; $i++) {
  echo 'el numero ' .$i .'</br>';
}

$datos = array(
  'nombre' => "hernan",
  'apellido' => "larzabal",
  'edad' => 36,
  'profesion' => "contador",
   );

echo 'tu nombre es '. $datos['nombre']. '</br>';
echo $datos['apellido'].'</br>';
echo $datos['edad'].'</br>';
echo $datos['profesion'].'</br>';

$numero = array(5,4,3,2,1 );


for ($i=0; $i < count($numero); $i++) {
  echo 'el numero ' .$numero[$i] .'</br>';
}

$auto=[];
$auto["color"]=["negro","blanco"];
$auto[]=1;
echo '</br>';
print_r($auto);
echo '</br>';

$amigos=[];
$amigos["varones"]=["Chiru","Adolfo","Pancho"];
$amigos["mujer"]=["Vero","Maca","Ceci"];
echo '</br>';
print_r($amigos);

echo '</br>';
echo '</br>';

for ($i=0; $i < count($amigos['varones']); $i++) {
  echo 'La mujer de ' .$amigos['varones'][$i] . ' se llama '.$amigos['mujer'][$i] .'</br>';
}


 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
     <title>FORMULARIO</title>
   </head>
   <body>
     <form action="recibe.php" method="get">
       <fieldset class="form-group">
         <label for="mail">Direccion de Email</label>
         <input name="email"type="email" class="form-control col col-md-4 " id="mail" placeholder="Escribe tu email">
       </fieldset>
       <fieldset class="form-group">
         <label for="clave">CLAVE</label>
         <input name="clave"type="password" class="form-control col col-md-4" id="clave" placeholder="Escribe tu clave">
       </fieldset>
       <fieldset class="form-group">
         <label for="exampleSelect1">Cuanto te gusta?</label>
         <select name="seleccion" class="form-control col col-md-1" id="exampleSelect1">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
         </select>
       </fieldset>

       <!-- <fieldset class="form-group">
         <label for="exampleSelect2">Example multiple select</label>
         <select multiple class="form-control" id="exampleSelect2">
           <option>1</option>
           <option>2</option>
           <option>3</option>
           <option>4</option>
           <option>5</option>
         </select>
       </fieldset>
       <fieldset class="form-group">
         <label for="exampleTextarea">Example textarea</label>
         <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
       </fieldset>
       <fieldset class="form-group">
         <label for="exampleInputFile">File input</label>
         <input type="file" class="form-control-file" id="exampleInputFile">
         <small class="text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
       </fieldset>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
           Option one is this and that&mdash;be sure to include why it's great
         </label>
       </div>
       <div class="radio">
         <label>
           <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
           Option two can be something else and selecting it will deselect option one
         </label>
       </div>
       <div class="radio disabled">
         <label>
           <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
           Option three is disabled
         </label>
       </div>
       <div class="checkbox">
         <label>
           <input type="checkbox"> Check me out
         </label>
       </div> -->
       <button type="submit" class="btn btn-primary">ENVIAR</button>
     </form>



<!-- <div class="row">
  <div class="col-md-4">
    <label for="numero1">NUMERO 1</label>
    <input type="text" name="numero1" id="numero1" value="">
  </div>
<div class="col-md-4">
  <label for="numero2">NUMERO 2</label>
  <input type="text" name="numero2" id="numero2" value="">
</div>
  <div class="col-md4">
    <label for="resultado">RESULTADO</label>
    <input type="text" name="resultado" id="resultado" value=" <?php echo $resultado ?>  ">
</div>

</div> -->


<form name="form1" method="post" action="">
  <p>
    Numero 1:

      <input onkeyup="if(form1.textfield2.value!=''){form1.textfield3.value = parseInt(this.value)+parseInt(form1.textfield2.value)}" name="textfield1" type="text" size="8" maxlength="8">
     </p>
     <p>
     Numero 2:
      <input onkeyup="if(form1.textfield2.value!=''){form1.textfield3.value = parseInt(this.value)+parseInt(form1.textfield1.value)}" name="textfield2" type="text" size="8" maxlength="8">

  </p>
  <p>Resultado es: <input name="textfield3" type="text" size="10" maxlength="10">
</p>
  </form>

<form action="" method="get">
  <fieldset class="form-group col-md-4">
    <label for="numero1">NUMERO 1</label>
    <input name="numero1" type="text" class="form-control" id="numero1" placeholder="numero 1">
  </fieldset>
  <fieldset class="form-group col-md-4">
    <label for="numero2">NUMERO 2</label>
    <input name="numero2" type="text" class="form-control" id="numero2" placeholder="numero 2">
  </fieldset>
  <fieldset>
    <label for="resultado">RESULTADO</label>
    <input name="resultado" type="text" class="form-control" id="resultado" placeholder="numero 2" value="<?php echo $numero1 + $numero2 ?>  ">
  </fieldset>
  <input type="submit" name="" value="OPERACION">
</form>

<?php n     
$numero1 = $_GET['numero1'];
$numero2 = $_GET['numero2'];

 ?>


   </body>
 </html>
