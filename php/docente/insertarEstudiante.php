<?php
session_start();

require( "../conexion.php" );

$identificacion = $_POST[ 'identificacion' ];
$contrasena = $_POST[ 'contrasena' ];
$nombre = $_POST[ 'nombre' ];
$apellido = $_POST[ 'apellido' ];
$edad=$_POST['edad'];
$grado = $_POST[ 'grado' ];
$sexo = $_POST[ 'sexo' ];
$idAdmin = $_SESSION[ "idAdmin" ];



$sql = "INSERT INTO `estudiante` (`idestudiante`, `contrasena`, `nombre`, `apellido`, `edad`, `grado`, `sexo`, `idDocente`) VALUES ('$identificacion', '$contrasena', '$nombre', '$apellido', '$edad', '$grado', '$sexo','$idAdmin');";

if ( $mysqli->query( $sql ) === TRUE ) {
	echo "<script>alert('Registro exitoso')</script>";
	echo "<script>location.href='registroEstudiante.php'</script>";
} else {
	echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

?>