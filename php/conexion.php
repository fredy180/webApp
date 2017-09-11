
<?php
	
	$mysqli = new mysqli("sql309.eshost.com.ar", "eshos_19978840", "31352188", "eshos_19978840_portalmate");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}



?>