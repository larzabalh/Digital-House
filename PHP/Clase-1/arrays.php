<?php
$animales2 = [
	'lobo',
	"perro",
	'gato',
	"ballena",
	'oso',
];
var_dump($animales2);
echo "<br>";
$animales2[] = 'elefante';
$animales2[] = 'cocodrilo';

var_dump($animales2);
echo "<br>";
echo "Me gustan los animales: $animales2[0], $animales2[1]";
echo "<br>";

$animales2[0] = 'Mapache';
var_dump($animales2);
echo "<br>";

$autos = [[
	'marca' => 'Peugeot',
	'modelo' => 208,
	'color' => 'gris',
	'año' => '2014',
	'patente' => 'dzf243',
	0 => 'Dario',
], [
	'marca' => 'Peugeot',
	'modelo' => 308,
	'color' => 'gris',
	'año' => '2014',
	'patente' => 'dzf243',
	0 => 'Alberto',
]];

$autos[] = [
	'marca' => 'Peugeot',
	'modelo' => 408,
	'color' => 'gris',
	'año' => '2014',
	'patente' => 'dzf243',
];

$autos[5] = [
	'marca' => 'Peugeot',
	'modelo' => 408,
	'color' => 'gris',
	'año' => '2014',
	'patente' => 'dzf243',
	0 => 'Juan',
];

var_dump($autos);
if(isset($autos[0][0]))
{
	echo $autos[0]['marca'];
}

if(isset($autos[2]['marca']))
{
	echo $autos[2]['marca'];
}

if(isset($autos['auto2']))
{
	echo $autos['auto2'][0];
}


$autos[1]['patente'] = 'dfr567';

var_dump($autos[1]);


