<?php
session_start();

require( "../conexion.php" );

$identificacion = $_POST[ 'identificacion' ];
$nombre = $_POST[ 'nombre' ];
$grado = $_POST[ 'grado' ];
$idAdmin = $_SESSION[ "idAdmin" ];

$arrayRespuesta=array();

$sql = "UPDATE `unidad` SET `idUnidad` = '$identificacion',  `nombreUnidad` = '$nombre', `grado` = '$grado', `idDocente` = '$idAdmin' WHERE `unidad`.`idUnidad` = '$identificacion'";

if ( $mysqli->query( $sql ) === TRUE ) {
	$arrayRespuesta= array("respuesta"=>"Actualizacion Exitosa", "id"=>"$identificacion", "nombre"=>"$nombre");
	
} else {
	$arrayRespuesta= array("respuesta"=>"Error: $sql <br> $mysqli->error");
}

echo(json_encode($arrayRespuesta));
$mysqli->close();

?>