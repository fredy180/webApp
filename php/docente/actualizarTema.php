<?php
session_start();

require( "../conexion.php" );

$idTema = $_POST[ 'idTema' ];
$nombreTema = $_POST[ 'nombreTema' ];
$contenido = $_POST[ 'contenido' ];
$imagen = $_POST[ 'imagen' ];
$video = $_POST[ 'video' ];
$unidad = $_POST[ 'unidad' ];

$arrayRespuesta=array();

$sql = "UPDATE `tema` SET `nombreTema` = '$nombreTema', `contenidoTema` = '$contenido', `imagenTema` = '$imagen', `videoTema` = '$video', `idUnidad` = '$unidad' WHERE `tema`.`idtema` = $idTema";

if ( $mysqli->query( $sql ) === TRUE ) {
	$arrayRespuesta= array("respuesta"=>"Actualizacion Exitosa", "id"=>"$idTema", "nombre"=>"$nombreTema");
	
} else {
	$arrayRespuesta= array("respuesta"=>"Error: $sql <br> $mysqli->error");
}

echo(json_encode($arrayRespuesta));
$mysqli->close();

?>