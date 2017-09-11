<?php
session_start();

require( "../php/conexion.php" );

$comentario = $_POST[ 'comentario' ];
$id=$_SESSION[ "idUnidad" ];
$ide=$_SESSION[ "idAdmin" ];


$sql = "INSERT INTO `comentario` (`idComentario`,`comentario`, `idDocente`, `idestudiante`, `idtema`) VALUES ('','$comentario', '$ide', null , '$id');";

if ( $mysqli->query( $sql ) === TRUE ) {
	echo "<script>alert('Registro exitoso')</script>";
	echo "<script>location.href='estudio.php'</script>";
} else {
	echo "<script>alert('ERROR')</script>";;
	echo "<script>location.href='estudio.php'</script>";
}

$mysqli->close();

?>