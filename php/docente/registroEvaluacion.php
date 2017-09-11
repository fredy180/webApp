<?php
session_start();

if ( $_SESSION[ "idAdmin" ] != "" ) {
	?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>DOCENTE</title>
		<script src="../../JavaScript/jquery-1.11.2.min.js" type="text/javascript"></script>
		<script src="../../JavaScript/materialize.min.js" type="text/javascript"></script>
		<script src="../../JavaScript/materialize.js" type="text/javascript"></script>
		<link href="../../CSS/materialize.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../../CSS/estilo.css">
		<link rel="stylesheet" href="../../CSS/materialize.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script>
			$( document ).ready( function () {

				$( ".button-collapse" ).sideNav();

				$( document ).ready( function () {
					$( 'select' ).material_select();
				} );
				$( '.collapsible' ).collapsible();


			} );
		</script>
	</head>

	<body>
		<!-- MENU DE NAVEGACION -->

		<nav class="teal  header">
			<div class="nav-wrapper"> <a href="#" class="brand-logo"><img alt="LOGO" src="../../imagenes/logo.png" width="250"></a> <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="../../pagina/estudio.php"><i class="material-icons left">home</i>INICIO</a>
					</li>
					<li><a href="registroEstudiante.php"><i class="material-icons left">inbox</i>ADMINISTRADOR</a>
					<li>
					<li><a href="../salir.php"><i class="material-icons left">person_outline</i>SALIR</a>
					</li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="../../pagina/estudio.php"><i class="material-icons left">home</i>INICIO</a>
					</li>
					<li><a href="registroEstudiante.php"><i class="material-icons left">inbox</i>ADMINISTRADOR</a>
					</li>
					<li><a href="../salir.php"><i class="material-icons left">person_outline</i>SALIR</a>
					</li>
				</ul>
			</div>
		</nav>

		<!------ contenedor--------->
		<div class="row contenido">
			<div class="col s12 m5 l3">
				<div class="z-depth-3"> <br>
					<br>
					<div class="card z-depth-2">
						<div class="card-content center">
							<h2>MENÚ</h2>
							<hr>
						</div>
						<ul class="collapsible">
							<li>
								<div class="collapsible-header"><i class="material-icons">person</i>ESTUDIANTE</div>
								<div class="collapsible-body">
									<span>
										<div class="collection"> <a href="#!" class="collection-item">REGISTRAR ESTUDIANTE</a> <a href="consultaEstudiante.php" class="collection-item ">CONSULTAR ESTUDIANTE</a> <a href="edicionEstudiante.php" class="collection-item">EDICION ESTUDIANTE</a> </div>
									</span>
								</div>
							</li>
							<li>
								<div class="collapsible-header"><i class="material-icons">assignment</i>UNIDADES</div>
								<div class="collapsible-body">
									<span>
										<div class="collection"> <a href="registroUnidad.php" class="collection-item ">NUEVA UNIDAD</a> <a href="consultaUnidad.php" class="collection-item">CONSULTAR UNIDAD</a> <a href="edicionUnidad.php" class="collection-item">EDICION UNIDAD</a> </div>
									</span>
								</div>
							</li>
							<li>
								<div class="collapsible-header"><i class="material-icons">assessment</i>TEMAS</div>
								<div class="collapsible-body">
									<span>
										<div class="collection"> <a href="registroTema.php" class="collection-item ">NUEVO TEMA</a> <a href="consultaTema.php" class="collection-item">CONSULTAR TEMA</a> <a href="edicionTema.php" class="collection-item">EDICION TEMA</a> </div>
									</span>
								</div>
							</li>
							<li>
								<div class="collapsible-header active"><i class="material-icons">colorize</i>EVALUACIONES</div>
								<div class="collapsible-body">
									<span>
										<div class="collection"> <a href="registroEvaluacion.php" class="collection-item active">NUEVA UVALUACION</a> <a href="consultaEvaluacion.php" class="collection-item">CONSULTAR RESULTADO</a> </div>
									</span>
								</div>
							</li>
						</ul>


					</div>
				</div>
			</div>
			<div id="articles">
				<div class="col s12 m7 l9 z-depth-3">
					<!-- Note that "m8 l9" was added -->
					<div class="row">
						<center>
							<h4>REGISTRAR EVALUACION</h4>
						</center>
						<hr>
						<form class="col s12" action="insertarEvaluacion.php" method="post">
							<div class="row">

								<div class="input-field col s12 m12 l9">
									<i class="material-icons prefix">mode_edit</i>
									<textarea id="pregunta" class="materialize-textarea" name="pregunta" required></textarea>
									<label for="pregunta">PREGUNTA</label>
								</div>
								<div class="input-field col s12 m12 l6 ">
									<input id="opcionA" type="text" class="validate " required name="opcionA">
									<label for="opcionA">OPCION A</label>
								</div>
								<div class="input-field col s12 m12 l6 ">
									<input id="opcionB" type="text" class="validate " required name="opcionB">
									<label for="opcionB">OPCION B</label>
								</div>
								<div class="input-field col s12 m12 l6 ">
									<input id="opcionC" type="text" class="validate " required name="opcionC">
									<label for="opcionC">OPCION C</label>
								</div>
								<div class="input-field col s12 m12 l6 ">
									<input id="opcionD" type="text" class="validate " required name="opcionD">
									<label for="opcionD">OPCION D</label>
								</div>

								<div class="col  s12 m12 l6">
									<label>OPCION CORRCTA</label>
									<select class="browser-default" name="respuesta" required>
										<option value="" disabled selected>OPCION CORRECTA</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="D">D</option>
									</select>
								</div>
								<div class="col  s12 m12 l6">
									<label>GRADO</label>
									<select class="browser-default" name="grado" required>
										<option value="" disabled selected>OPCION GRADO</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
								</div>


							</div>

							<center><button class="btn waves-effect waves-light" type="submit" name="action">GUARDAR</button>
							</center>
						</form>

					</div>

				</div>
			</div>
		</div>

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
	header( "location:../../index.php" );
}
?>