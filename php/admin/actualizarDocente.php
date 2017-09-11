<?php
session_start();

require( "../conexion.php" );

$identificacion = $_POST[ 'identificacion' ];
$contrasena = $_POST[ 'contrasena' ];
$nombre = $_POST[ 'nombre' ];
$apellido = $_POST[ 'apellido' ];
$grado = $_POST[ 'grado' ];
$sexo = $_POST[ 'sexo' ];
$telefono = $_POST[ 'telefono' ];
$idAdmin = $_SESSION[ "idAdmin" ];

$arrayRespuesta=array();

$sql = "UPDATE `docente` SET `contraDocente` = '$contrasena', `nombre` = '$nombre', `apellido` = '$apellido', `gradoEncargado` = '$grado', `sexo` = '$sexo', `telefono` = '$telefono', `idAdministrador` = '$idAdmin' WHERE `docente`.`iddocente` = '$identificacion'";

if ( $mysqli->query( $sql ) === TRUE ) {
	$arrayRespuesta= array("respuesta"=>"Actualizacion Exitosa", "id"=>"$identificacion", "nombre"=>"$nombre");
	
} else {
	$arrayRespuesta= array("respuesta"=>"Error: $sql <br> $mysqli->error");
}

echo(json_encode($arrayRespuesta));
$mysqli->close();

?>