<?php
//para que es esto??
session_start();

require( "../php/conexion.php" );

$ide = $_POST[ 'ide' ];
$_SESSION[ "idUnidad" ]=$ide;

$arrayRespuesta=array();

$sql2 = $mysqli->query( "SELECT `nombreTema`,`contenidoTema`,imagenTema,videoTema FROM `tema` WHERE `idUnidad`=$ide" );

$arrayRespuesta=array();
while($fila= $sql2->fetch_assoc()) {
	//como puede tener varios contenidos se crea un array para cada contenido. fila es un array q se agraga dentro del $arrayRespuesta 
	
	array_push($arrayRespuesta,$fila);
}
// el array se convierte a formato json
echo(json_encode($arrayRespuesta));
$mysqli->close();
exit();

?>