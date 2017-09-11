<?php
session_start();

require( "../conexion.php" );

$nombre = $_POST[ 'nombre' ];
$grado = $_POST[ 'grado' ];
$idAdmin = $_SESSION[ "idAdmin" ];



$sql = "INSERT INTO `unidad` (`idUnidad`, `nombreUnidad`, `grado`, `idDocente`) VALUES ('', '$nombre', '$grado', '$idAdmin');";

if ( $mysqli->query( $sql ) === TRUE ) {
	echo "<script>alert('Registro exitoso')</script>";
	echo "<script>location.href='registroUnidad.php'</script>";
} else {
	echo "<script>alert('ERROR Unidad ya existe')</script>";;
	echo "<script>location.href='registroUnidad.php'</script>";
}

$mysqli->close();

?>