<?php
session_start();

if ( $_SESSION[ "idAdmin" ] != "" ) {
	?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>ADMINISTRADOR</title>
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
				$('.collapsible').collapsible();
			

			} );
		</script>

		<script>
			var ordenar = 0;
		</script>
	</head>

	<body>
		<!-- MENU DE NAVEGACION -->

		<nav class="teal  header">
			<div class="nav-wrapper"> <a href="#" class="brand-logo"><img alt="LOGO" src="../../imagenes/logo.png" width="250"></a> <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="../../pagina/estudio.php"><i class="material-icons left">home</i>INICIO</a>
					</li>
					<li><a href="registroDocente.php"><i class="material-icons left">inbox</i>ADMINISTRADOR</a>
					</li>
					<li><a href="../salir.php"><i class="material-icons left">person_outline</i>SALIR</a>
					</li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="../../pagina/estudio.php"><i class="material-icons left">home</i>INICIO</a>
					</li>
					<li><a href="registroDocente.php"><i class="material-icons left">inbox</i>ADMINISTRADOR</a>
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
						<ul class="collapsible " data-collapsible="expandable">
							<li>
								<div class="collapsible-header"><i class="material-icons">person</i>ESTUDIANTE</div>
								<div class="collapsible-body">
									<span>
										<div class="collection"> <a href="registroEstudiante.php" class="collection-item">REGISTRAR ESTUDIANTE</a> <a href="consultaEstudiante.php" class="collection-item ">CONSULTAR ESTUDIANTE</a> <a href="edicionEstudiante.php" class="collection-item ">EDICION ESTUDIANTE</a> </div>
									</span>
								</div>
							</li>
							<li>
								<div class="collapsible-header"><i class="material-icons">assignment</i>UNIDADES</div>
								<div class="collapsible-body">
									<span>
										<div class="collection"> <a href="registroUnidad.php" class="collection-item">NUEVA UNIDAD</a> <a href="consultaUnidad.php" class="collection-item">CONSULTAR UNIDAD</a> <a href="edicionUnidad.php" class="collection-item ">EDICION UNIDAD</a> </div>
									</span>
								</div>
							</li>
							<li>
								<div class="collapsible-header active"><i class="material-icons">assessment</i>TEMAS</div>
								<div class="collapsible-body">
									<span>
										<div class="collection"> <a href="registroTema.php" class="collection-item ">NUEVO TEMA</a> <a href="consultaTema.php" class="collection-item">CONSULTAR TEMA</a> <a href="edicionTema.php" class="collection-item active">EDICION TEMA</a> </div>
									</span>
								</div>
							</li>
							<li>
								<div class="collapsible-header "><i class="material-icons">colorize</i>EVALUACIONES</div>
								<div class="collapsible-body">
									<span>
										<div class="collection"> <a href="registroEvaluacion.php" class="collection-item">NUEVA UVALUACION</a> <a href="consultaEvaluacion.php" class="collection-item">CONSULTAR RESULTADO</a> </div>
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
					<div class="row  offset-s4 teal ">

						<div class="col s12 m12 l6 ">
							<label class="white">Filtar Busqueda</label>
							<select class="browser-default filtro white">
								<option value="0">Codigo</option>
								<option value="1">Nombre</option>
								<option value="2">Unidad</option>
							</select>
						</div>
						<div class="input-field col s12 m12 l5 white ">
							<input type="search" id="myInput" onkeyup="buscarDocente()" required style="margin-top: 10px;" placeholder="Buscar por contenido...">
							<label class="label-icon" for="search"><i class="material-icons"></i></label>
							

						</div>
						<hr class="col s12">

					</div>


					<div class="row">

						<table class="responsive-table highlight centered bordered" id="tabla">
							<thead>
								<tr class="header">
									<th>CODIGO</th>
									<th>NOMBRE</th>
									<th>CONTENIDO TEMA</th>
									<th>URL IMAGEN</th>
									<th>URL VIDEO</th>
									<th>UNIDAD</th>
									<th>ACCION</th>

								</tr>
							</thead>

							<tbody>
								<?php

								require( "../conexion.php" );
									$id=$_SESSION["idAdmin"];

								$sql2 = $mysqli->query( "SELECT `idtema`,`nombreTema`,`contenidoTema`,`imagenTema`,`videoTema`, u.idUnidad FROM tema i , unidad u WHERE u.idDocente='$id' AND u.idUnidad=i.idUnidad" );
								$con = 0;
								while ( $fila = mysqli_fetch_assoc( $sql2 ) ) {
									$con = $con + 1;
									echo "<tr>" .
									"<td>" . $fila[ 'idtema' ] . "</td>" .
									"<td contenteditable='true'>" . $fila[ 'nombreTema' ] . "</td>" .
									"<td contenteditable='true'>" . $fila[ 'contenidoTema' ] . "</td>" .
									"<td contenteditable='true'>" . $fila[ 'imagenTema' ] . "</td>" .
									"<td contenteditable='true'>" . $fila[ 'videoTema' ] . "</td>" .
									"<td contenteditable='true'>" . $fila[ 'idUnidad' ] . "</td>" .
									"<td>" .
									"<a href='#' id='$con' onclick='actualizar(this.id)'>Actualizar</a>" . " / " .
									"<a href='#' id='$con' onclick='eliminar(this.id)'>Eliminar</a>" .
									"</td>" .

									"</tr>";

								}


								?>

							</tbody>
						</table>



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
		<script>
			
			
			$( ".filtro" ).change( function () {;
            ordenar = $( ".filtro" ).val();



        } );
			
			
			function actualizar( id_fila ) {
				var idTema = document.getElementById( "tabla" ).rows[ id_fila ].cells.item( 0 ).innerHTML;
				var nombreTema = document.getElementById( "tabla" ).rows[ id_fila ].cells.item( 1 ).innerHTML;
				var contenido = document.getElementById( "tabla" ).rows[ id_fila ].cells.item( 2 ).innerHTML;
				var imagen = document.getElementById( "tabla" ).rows[ id_fila ].cells.item( 3 ).innerHTML;
				var video = document.getElementById( "tabla" ).rows[ id_fila ].cells.item( 4 ).innerHTML;
				var unidad = document.getElementById( "tabla" ).rows[ id_fila ].cells.item( 5 ).innerHTML;
				
				$.ajax( {
					url: "actualizarTema.php",
					method: "POST",
					data: {

						idTema: idTema,
						nombreTema: nombreTema,
						contenido: contenido,
						imagen: imagen,
						video: video,
						unidad: unidad,
						

					},success:function(resp){
						var deco= JSON.parse(resp);
						alert( deco.id +" "+deco.nombre+" "+ deco.respuesta);
					}

				} );
			}

			function eliminar( id_fila ) {
				var identificacion = document.getElementById( "tabla" ).rows[ id_fila ].cells.item( 0 ).innerHTML;
				$.ajax( {
					url: "eliminarTema.php",
					method: "POST",
					data: {
						identificacion: identificacion
					},success:function(resp){
						var deco= JSON.parse(resp);
						alert( deco.id +" "+ deco.respuesta);
					}

				} );
				document.getElementById( "tabla" ).deleteRow( id_fila );
				
			}

			function buscarDocente() {
				
		
				var input, filter, table, tr, td, i;
				input = document.getElementById( "myInput" );
				filter = input.value.toUpperCase();
				table = document.getElementById( "tabla" );
				tr = table.getElementsByTagName( "tr" );
				for ( i = 0; i < tr.length; i++ ) {
					td = tr[ i ].getElementsByTagName( "td" )[ ordenar ];
					if ( td ) {
						if ( td.innerHTML.toUpperCase().indexOf( filter ) > -1 ) {
							tr[ i ].style.display = "";
						} else {
							tr[ i ].style.display = "none";
						}
					}
				}
			}
		</script>
	</body>

	</html>
	<?php
} else {
	header( "location:../../index.php" );
}
?>