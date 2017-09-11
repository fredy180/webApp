<?php
session_start();

require( "../conexion.php" );

$identificacion = $_POST[ 'identificacion' ];
$contrasena = $_POST[ 'contrasena' ];
$nombre = $_POST[ 'nombre' ];
$apellido = $_POST[ 'apellido' ];
$edad = $_POST[ 'edad' ];
$grado = $_POST[ 'grado' ];
$sexo = $_POST[ 'sexo' ];
$idAdmin = $_SESSION[ "idAdmin" ];

$arrayRespuesta=array();

$sql = "UPDATE `estudiante` SET `idestudiante` = '$identificacion', `contrasena` = '$contrasena', `nombre` = '$nombre', `apellido` = '$apellido', `edad` = '$edad', `grado` = '$grado', `sexo` = '$sexo',  `idDocente` = '$idAdmin' WHERE `estudiante`.`idestudiante` = '$identificacion'";

if ( $mysqli->query( $sql ) === TRUE ) {
	$arrayRespuesta= array("respuesta"=>"Actualizacion Exitosa", "id"=>"$identificacion", "nombre"=>"$nombre");
	
} else {
	$arrayRespuesta= array("respuesta"=>"Error: $sql <br> $mysqli->error");
}

echo(json_encode($arrayRespuesta));
$mysqli->close();

?>