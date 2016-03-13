<?php
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	require_once("conexion.php");
	require_once("funciones.php");
	if (!isset($_SESSION['user'])){
		echo '<script>
			alert("Lo sentimos, pero su sesión ha caducado.\n\nPor favor, vuelva a introducir su nombre de usuario y contraseña.");
			location.href="index.php";
		</script>';
	}
	else {
		$query="SELECT nombre_profesor FROM profesor where id_profesor='".$_SESSION['user']."'";		$resultado=pg_query($query,$cn);		$profesor=pg_fetch_array($resultado,null,PGSQL_ASSOC);		$consultaParteProfesor="SELECT count(nombre_profesor) AS partes FROM profesor INNER JOIN parte ON profesor.id_profesor = parte.cod_profesor";		$resultadoProfesor=pg_query($consultaParteProfesor,$cn);		$res=pg_fetch_array($resultadoProfesor,null,PGSQL_ASSOC);
		echo '<!DOCTYPE html>
			<html>
				<head>
					<title>Administración de incidencias</title>
					<link rel="stylesheet" type="text/css" media="screen" href="css/estilos.css" />
					<link rel="stylesheet" type="text/css" media="screen" href="css/estilosCSS3.css" />
					<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
					<script type="text/javascript" src="js/funcionesjq.js"></script>
					<script type="text/javascript" src="js/funciones.js"></script>
					<link type="image/x-icon" rel="shortcut icon" href="http://cesramonycajal.com/cesramonycajal/templates/ja_purity/favicon.ico">
					<!-- Bootstrap -->
					<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
					<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-responsive.min.css" />
					<script type="text/javascript" src="js/bootstrap.min.js"></script>
				</head>
				<body>
					<div id="contenedor" class="container">
						<header>
							<div id="logoAdministracion">
								<img src="img/logo.png" alt="logo" />
							</div>
							<h1>Administración de incidencias</h1>
							<p>Bienvenido, '.$profesor['nombre_profesor'].'</p>							
							<p id="parteSinResolver"> El servidor está calculando los partes sin resolver. <img src="img/cargando.gif" alt="cargando" /></p>
						</header>
						<div id="error" class="alert alert-error" >
							<p>¡No ha seleccionado nada!</p>
						</div>
						<div id="warning" class="alert alertWarning" >
							<p>No ha seleccionado nada, por lo que se ha enviado la consulta sin datos.</p>
						</div>
						<div id="opciones">
							<p>
								¿Qué desea hacer?
								<select id="accionAdministrador" name="accionAdministrador" class="span4" >
									<option value="">Seleccione una opción...</option>
									<option value="1">Buscar partes por fecha, hora o aula</option>
									<option value="2">Ver el total de partes que ha enviado un profesor</option>
									<option value="3">Seleccionar pc para ver histórico de incidencias</option>
								</select>
								<input type="button" id="accionAdministradorSeleccionada" value="Ir" class="btn" />
							</p>
							<form id="formCerrar" action="cerrar.php" method="post">
								<div id="divCerrar">
									<input type="submit" id="btnCerrar" name="btnCerrar" value="Salir" class="btn btn-danger" />
								</div>
							</form>
						</div>
						<div id="zonaBusqueda">
							<form id="busqueda" action="" method="post" class="form-search" >
								<b>Buscar por:</b>
								Fecha: <input type="text" id="fechaFormFH" name="fechaFormFH" placeholder="Formato: aaaa-mm-dd" class="input-medium" />
								&nbsp;Hora: <select id="horaFormFH" name="horaFormFH"  class="input-large" >
												<option value="">Seleccione una hora...</option>
												<option value="1M">Primera hora -- Mañana</option>
												<option value="2M">Segunda hora -- Mañana</option>
												<option value="3M">Tercera hora -- Mañana</option>
												<option value="4M">Cuarta hora -- Mañana</option>
												<option value="5M">Quinta hora -- Mañana</option>
												<option value="6M">Sexta hora -- Mañana</option>
												<option value="1T">Primera hora -- Tarde</option>
												<option value="2T">Segunda hora -- Tarde</option>
												<option value="3T">Tercera hora -- Tarde</option>
												<option value="4T">Cuarta hora -- Tarde</option>
												<option value="5T">Quinta hora -- Tarde</option>
												<option value="6T">Sexta hora -- Tarde</option>
											</select>
								&nbsp;Del aula: '.lista_salas('').'
								<input type="submit" id="btnEnviarFormFHA" value="Consultar" class="btn btn-info" />
								<input type="button" value="Volver" class="volverOpciones btn btn-inverse" />
							</form>
						</div>
						<div id="zonaHistorico">
							<form id="busquedaHistorico" action="" method="post" class="form-search" >
								Seleccionar profesor: '.lista_profesores('').'
								<input type="submit" id="btnEnviarFormHistorico" value="Consultar" class="btn btn-info" />
								<input type="button" value="Volver" class="volverOpciones btn btn-inverse" />
							</form>
						</div>
						<div id="zonaIncidencias">
							<form id="busquedaIncidencias" action="" method="post" class="form-search" >
								Seleccionar PC: <select id="pcIncidencia" name="pcIncidencia"  class="input-large" >
												<option value="">Seleccione un pc...</option>
												<option value="pc1">Ordenador 1</option>
												<option value="pc2">Ordenador 2</option>
												<option value="pc3">Ordenador 3</option>
												<option value="pc4">Ordenador 4</option>
												<option value="pc5">Ordenador 5</option>
												<option value="pc6">Ordenador 6</option>
												<option value="pc7">Ordenador 7</option>
												<option value="pc8">Ordenador 8</option>
												<option value="pc9">Ordenador 9</option>
												<option value="pc10">Ordenador 10</option>
												<option value="pc11">Ordenador 11</option>
												<option value="pc12">Ordenador 12</option>
												<option value="pc13">Ordenador 13</option>
												<option value="pc14">Ordenador 14</option>
												<option value="pc15">Ordenador 15</option>
												<option value="pc0">Ordenador profesor</option>
											</select>
								&nbsp;Seleccionar sala: '.lista_salas_incidencias('').'
								<input type="submit" id="btnEnviarFormIncidencia" value="Consultar" class="btn btn-info" />
								<input type="button" value="Volver" class="volverOpciones btn btn-inverse" />
							</form>
						</div>
						<div id="cuerpo"></div>
						<footer class="pie">
							<p>
								Soc. Coop. Andaluza TEAR
								<br/>
								C/.Cañaveral, s/n 18004 - Granada Tel: 958 279 762 - 958 279 766 Fax: 958 204 828
								<br/>
								<a href="http://www.cesramonycajal.com" target="_blank">www.cesramonycajal.com</a>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="http://www.tearformacion.com" target="_blank">www.tearformacion.com</a>
							</p>
							<hr>
							<p>
								Centro concertado con la Consejería de Educación de la Junta de Andalucía
							</p>
						</footer>
					</div>
				</body>
			</html>';			pg_free_result($resultadoProfesor);
	}
?>