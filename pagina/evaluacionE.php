<?php
session_start();

if ( ( $_SESSION[ "idAdmin" ] ) != "" ) {
	?>
	<!doctype html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>TEMAS DE ESTUDIO</title>
		<script src="../JavaScript/jquery-1.11.2.min.js" type="text/javascript"></script>
		<script src="../JavaScript/materialize.min.js" type="text/javascript"></script>
		<script src="../JavaScript/materialize.js" type="text/javascript"></script>
		<link href="CSS/materialize.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../CSS/estilo.css">
		<link rel="stylesheet" href="../CSS/materialize.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script>
			var ide = 0;
			$( document ).ready( function () {
				$( '.collapsible' ).collapsible();

				$( '.collapsible' ).collapsible( 'open', 0 );

				// Close
				$( '.collapsible' ).collapsible( 'close', 0 );

				// Destroy
				$( '.collapsible' ).collapsible( 'destroy' );

				// Open

				$( '.collapsible' ).collapsible( {
					accordion: false, // A setting that changes the collapsible behavior to expandable instead of the default accordion style
					onOpen: function ( el ) {}, // Callback for Collapsible open
					onClose: function ( el ) {} // Callback for Collapsible close
				} );
				$( ".button-collapse" ).sideNav();

			} );
		</script>
	</head>

	<body>

		<!-- MENU DE NAVEGACION -->

		<nav class="teal  header">
			<div class="nav-wrapper"> <a href="#" class="brand-logo"><img alt="LOGO" src="../imagenes/logo.png" width="250"></a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="estudioEstudiante.php"><i class="material-icons left">home</i>INICIO</a>
					</li>
					<li><a href="evaluacionE.php"><i class="material-icons left">home</i>EVALUACION</a>
					</li>

					<li><a href="../php/salir.php"><i class="material-icons left">person_outline</i>SALIR</a>
					</li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="estudioEstudiante.php"><i class="material-icons left">home</i>INICIO</a>
					</li>
					<li><a href="evaluacionE.php"><i class="material-icons left">home</i>EVALUACION</a>
					</li>

					<li><a href="../php/salir.php"><i class="material-icons left">person_outline</i>SALIR</a>
					</li>
				</ul>
			</div>
		</nav>

		<!------ contenedor--------->
		<div class="row contenido">

			<div id="articles">
				<div class="col s8 offset-s2">
					<!-- Note that "m8 l9" was added -->
					<?php
					require( "../php/conexion.php" );
					$grad0 = $_SESSION[ "grado" ];
					$sql2 = $mysqli->query( "SELECT * FROM `evaluacion` WHERE `grado`=$grad0" );
					$i=0;$j=1;;
					?>

					<?php while ( $fila = mysqli_fetch_assoc( $sql2 ) ) {	$i++;$j=$j+10?>

					<div class="input-field col s12">
						<textarea id="textarea1" class="materialize-textarea"></textarea>
						<label for="textarea1"><?php echo($fila[ 'pregunta' ])?></label>
					</div>
					<form action="#" >
					

						<p>
							<input class="with-gap" name="<?php echo("n".$i)?>" type="radio"  id="<?php echo('ide'.$j)?>" />
							<label for="<?php echo('ide'.$j)?>"><?php echo($fila[ 'opcionA' ])?></label>
						</p>
						<p>
							<input class="with-gap"  name="<?php echo("n".$i)?>" type="radio" id="<?php echo('ide'.($j+1))?>" />
							<label for="<?php echo('ide'.($j+1))?>"><?php echo($fila[ 'opcionB' ])?></label>
						</p>
						<p>
							<input class="with-gap" name="<?php echo("n".$i)?>" type="radio" id="<?php echo('ide'.($j+2))?>" />
							<label for="<?php echo('ide'.($j+2))?>"><?php echo($fila[ 'opcionC' ])?></label>
						</p>
						<p>
							<input class="with-gap" name="<?php echo("n".$i)?>" type="radio" id="<?php echo('ide'.($j+3))?>" />
							<label for="<?php echo('ide'.($j+3))?>"><?php echo($fila[ 'opcionD' ])?></label>
						</p>

  
					</form>
					<?php }	?>

				</div>
			</div>

		</div>

		<script>
			function cargarTema( id ) {
				ide = id;
				var parametros = {
					ide: ide

				};


				$.ajax( {
					data: parametros,
					url: 'contendioInicio.php',
					type: 'post',
					beforeSend: function () {},
					success: function ( response ) {
						// se convierte la respueta a array para mayor facilidad
						var arrayDatos = JSON.parse( response );
						var contenidoDiv = "";
						var comentario = "<button class='btn waves-effect waves-light' type='submit' name='action'>Comentar" +
							"<i class='material-icons right'></i>" +
							"</button>";
						var imagen, video;
						arrayDatos.forEach( function ( subArrayDatos, indice, arrayDatos ) {
							imagen = subArrayDatos[ 'imagenTema' ];
							video = subArrayDatos[ 'videoTema' ];

							contenidoDiv = contenidoDiv +
								"<h4>" + subArrayDatos[ "nombreTema" ] +
								"</h4> <p style='text-align: justify'>" +
								subArrayDatos[ "contenidoTema" ] +
								"</p> " +
								"<img src='" + imagen + "' />" +
								"<iframe width='60%' height='315' src='" + video + "'>	</iframe>";
							/<!--que pasa novato-->/

						} );
						$( "#contenedor" ).html( contenidoDiv );
						$( "#button" ).html( comentario );
						cargarComentario( ide );

					}
				} );
			}

			function cargarComentario( ide ) {

				var parametros = {
					ide: ide

				};


				$.ajax( {
					data: parametros,
					url: 'comentario.php',
					type: 'post',
					beforeSend: function () {},

					success: function ( response ) {
						// se convierte la respueta a array para mayor facilidad
						var arrayDatos = JSON.parse( response );
						var contenidoDiv = "";
						var conta = 0;
						arrayDatos.forEach( function ( subArrayDatos, indice, arrayDatos ) {
							if ( subArrayDatos[ "idDocente" ] != null ) {
								contenidoDiv = contenidoDiv +
									"<h5>Docente " + subArrayDatos[ "idDocente" ] + ":" +
									"</h5> <p style='text-align: justify'>" +
									subArrayDatos[ "comentario" ] +
									"</p> <hr> ";
							} else {
								contenidoDiv = contenidoDiv +
									"<h5> Estudiante " + subArrayDatos[ "idestudiante" ] + ":" +
									"</h5> <p style='text-align: justify'>" +
									subArrayDatos[ "comentario" ] +
									"</p> <hr> ";
							}

						} );

						$( "#comentario" ).html( contenidoDiv );


					}
				} );
			}
		</script>


		<script>
		</script>

		<!-- ESTA ES LA SECCIÓN DE PIE DE PAGINA -->
		<footer class="page-footer  teal darken-3">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Contacto.</h5>
						<p class="grey-text text-lighten-4">Institucion Educativa</p>
					</div>
				</div>
			</div>
			<div class="footer-copyright teal darken-4">
				<div class="container"> Sincelejo © 2006-2017 </div>
			</div>
		</footer>
	</body>

	</html>
	<?php
} else {
	header( "location:../index.php" );
}
?>