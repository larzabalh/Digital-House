<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<pre>
<?php 
print_r($_POST);
$info = $_POST;
/*if($_POST){
	foreach( $_POST as $key => $value ){
		if(is_array($value)){

		}else{
		echo 'El '.$key.' es: '.$value.'<br>';
		}
	}
}*/	

/*
foreach(){
	is_array()
}*/

$Meses = [
  1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 
  5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 
  9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre', 
];
?>
</pre>
<h2>PHP Form bla bla</h2>

<form method="POST" action="">
    <label for="nombre">Nombre:</label>
 	<input type="text" name="name"
	 value="<?php echo isset($_POST['name'])? $_POST['name'] : ''; ?>">
    <br><br>

    <label for="email">Email:</label>
	<input type="text" name="email" value="">
    <br><br>

    <label for="">Como dormiste anoche?</label>
	<select name="dormiste">
<?php
	for($x = 1; $x<=10; $x++){
		echo "<option value='$x'>$x</option>";
	}
?>
	</select>
	<br>

    <label for="">Fecha de nacimiento</label>
	<select name="anio_nacimiento">
<?php
	for($x = date('Y'); $x>=1925; $x--){
		echo "<option value='$x'>$x</option>";
	}
?>
	</select>
	<select name="mes_nacimiento">
<?php
	foreach($Meses as $mes => $valor){
		echo "<option value='$mes'>$valor</option>";
	}
?>
	</select>
	<br>
	<label for="">Como te enteraste?</label>
	<label for="">Radio</label>
	  <input type="checkbox"
<?php if(isset($_POST['enteraste'][0])){ echo 'checked'; } ?>
 name="enteraste[0]" value="radio">
	<label for="">TV</label>
	  <input type="checkbox"
<?php if(isset($_POST['enteraste'][1])){ echo 'checked'; } ?> name="enteraste[1]" value="tv">
	<label for="">Email</label>
	  <input type="checkbox"
<?php if(isset($_POST['enteraste'][2])){ echo 'checked'; } ?> name="enteraste[2]" value="email">
	<br>

	<label for="">Genero:</label>
	<label for="">Femenino</label>
	  <input type="radio"
<?php if(isset($_POST['genero']) && $_POST['genero']=='F'){ echo 'checked'; } ?>
 name="genero" value="F">
	<label for="">Masculino</label>
	  <input type="radio"
<?php if(isset($_POST['genero']) && $_POST['genero']=='M'){ echo 'checked'; } ?> name="genero" value="M">
	<br>
    <button type="submit">Enviar</button>
</form>

</body>
</html>
