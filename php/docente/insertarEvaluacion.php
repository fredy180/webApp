<?php
session_start();

require( "../conexion.php" );

$pregunta = $_POST[ 'pregunta' ];
$opcionA = $_POST[ 'opcionA' ];
$opcionB = $_POST[ 'opcionB' ];
$opcionC = $_POST['opcionC'];
$opcionD=$_POST['opcionD'];
$respuesta=$_POST['respuesta'];
$grado=$_POST["grado"];
$idAdmin = $_SESSION[ "idAdmin" ];



$sql = "INSERT INTO `evaluacion` (`idevaluacion`, `pregunta`, `opcionA`, `opcionB`, `opcionC`, `opcionD`, `respuesta`, `grado`, `iddocente`) VALUES ('', '$pregunta', '$opcionA', '$opcionB', '$opcionC', '$opcionD', '$respuesta', '$grado', '$idAdmin');;";

if ( $mysqli->query( $sql ) === TRUE ) {
	echo "<script>alert('Registro exitoso')</script>";
	echo "<script>location.href='registroEvaluacion.php'</script>";
} else {
	echo "<script>alert('ERROR Evaluacion')</script>";;
	echo "<script>location.href='registroEvaluacion.php'</script>";
}

$mysqli->close();

?>