<?php
session_start();

require( "../conexion.php" );

$nombre = $_POST[ 'nombre' ];
$contenido = $_POST[ 'contenido' ];
$imagen = $_POST['imagen'];
$video=$_POST['video'];
$unidad=$_POST['unidad'];



$sql = "INSERT INTO `tema` (`idtema`, `nombreTema`, `contenidoTema`, `imagenTema`, `videoTema`, `idUnidad`) VALUES ('', '$nombre', '$contenido', '$imagen', '$video', '$unidad');";

if ( $mysqli->query( $sql ) === TRUE ) {
	echo "<script>alert('Registro exitoso')</script>";
	echo "<script>location.href='registroTema.php'</script>";
} else {
	echo "<script>alert('ERROR Tema ya existe')</script>";;
	echo "<script>location.href='registroUnidad.php'</script>";
}

$mysqli->close();

?>