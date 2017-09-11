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



$sql = "INSERT INTO `docente` (`iddocente`, `contraDocente`, `nombre`, `apellido`, `gradoEncargado`, `sexo`,`telefono` , `idAdministrador`) VALUES ('$identificacion', '$contrasena', '$nombre', '$apellido', '$grado', '$sexo', '$telefono','$idAdmin');";

if ( $mysqli->query( $sql ) === TRUE ) {
	echo "<script>alert('Registro exitoso')</script>";
	echo "<script>location.href='registroDocente.php'</script>";
} else {
	echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

?>