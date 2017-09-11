<?php
session_start();

require( "../conexion.php" );

$identificacion = $_POST[ 'identificacion' ];


$arrayRespuesta=array();

$sql = "DELETE FROM `estudiante` WHERE `idestudiante`=$identificacion";

if ( $mysqli->query( $sql ) === TRUE ) {
	$arrayRespuesta= array("respuesta"=>"Eliminacion Exitosa", "id"=>"$identificacion");
} else {
	$arrayRespuesta= array("respuesta"=>"Error: $sql <br> $mysqli->error");
}
echo(json_encode($arrayRespuesta));
$mysqli->close();

?>