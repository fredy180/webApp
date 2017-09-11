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
			<div class="col s12 m5 l3">
				<div class="z-depth-3"> <br>
					<br>
					<center>
						<h4 class="teal-text darken-3">TEMAS ESTUDIO</h4>
					</center>
					<hr>
					<ul class="collapsible">
						<li>
							<div class="collapsible-header active"><i class="material-icons">person</i>GRADO NOVENO</div>
							<div class="collapsible-body">
								<span>
									<div class="collection">

										<ol>
											<?php
											require( "../php/conexion.php" );
											$ide = $_SESSION[ "idAdmin" ];
											$grado=$_SESSION["grado"];
											if ( $grado==9)  {

												$sql2 = $mysqli->query( "SELECT idUnidad,nombreUnidad FROM `unidad` WHERE `grado`=9 AND iddocente=$ide" );
												while ( $fila = mysqli_fetch_assoc( $sql2 ) ) {
													$nombre = $fila[ 'nombreUnidad' ];
													$idtema = $fila[ 'idUnidad' ];
													echo "<li id='$idtema' onClick='cargarTema(this.id)'><a  href='#' class='collection-item tema1'>$nombre</a>
										</li>";
												}
											}


											?>



										</ol>
									</div>
								</span>
							</div>
						</li>
						<li>
							<div class="collapsible-header active"><i class="material-icons">person</i>GRADO DECIMO</div>
							<div class="collapsible-body">
								<span>
									<div class="collection">

										<ol>
											<?php
												$grado=$_SESSION["grado"];
											if ( $grado==10)  {
												require( "../php/conexion.php" );
												$ide = $_SESSION[ "idAdmin" ];												
												$sql2 = $mysqli->query( "SELECT idUnidad,nombreUnidad FROM `unidad` WHERE `grado`=10 AND iddocente=$ide" );
												while ( $fila = mysqli_fetch_assoc( $sql2 ) ) {
													$nombre = $fila[ 'nombreUnidad' ];
													$idtema = $fila[ 'idUnidad' ];
													echo "<li id='$idtema' onClick='cargarTema(this.id)'><a  href='#' class='collection-item tema1'>$nombre</a>
										</li>";
												}
											}

											?>



										</ol>
									</div>
								</span>
							</div>
						</li>
												
					</ul>
				</div>
			</div>
			<div id="articles">
				<div class="col s12 m7 l9 z-depth-3">
					<!-- Note that "m8 l9" was added -->
					<div class="row">

						<div id="contenido" class="col s12 m12 l10">

							<!-- estructura temas -->

							<article id="contenedor">
								<!--<div id="contenedor"></div>-->
								<h4>ICFES Preparación</h4>
								<p style="text-align: justify"> Pruebas Saber pro, Está estipulado que los alumnos que obtengan los diez primeros puntajes del departamento o capital reciben una distinción llamada Andrés Bello además de recibir descuentos para estudiar en varias universidades de hasta el 75% o incluso becas completas. </p>
								<img src="https://eduardolobatonrd.files.wordpress.com/2013/01/img_52.jpg?w=610&h=276" alt="">
							</article>



						</div>
					</div>

					<hr>
					<br>
					<div class="row grey lighten-4 z-depth-2">
						<form class="col s12 m12 l12 " action="insertarComentarioE.php" method="post">
							<div class="row">
								<div class="input-field col s12">
									<textarea id="textarea1" class="materialize-textarea" name="comentario"></textarea>
									<label for="textarea1">Comentarios</label>
								</div>
								<div id="button">
									<button class="btn waves-effect waves-light" type="submit" name="action" disabled>Comentar
                  			 <i class="material-icons right"></i>
 						</button>
								</div>

							</div>
						</form>

						<div id="comentario" class="col s12 m8 l9 ">
							<h5></h5>
							<p></p>
							<hr>

						</div>


					</div>

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