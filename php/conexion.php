
<?php
	
	$mysqli = new mysqli("localhost", "root", "", "b1");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}



?>