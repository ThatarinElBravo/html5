<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
	require_once("conexion.php");
	require_once("funciones.php");
	session_start();
	if (!isset($_SESSION['user'])){
		echo '<script>
			alert("Lo sentimos, pero su sesión ha caducado.\n\nPor favor, vuelva a introducir su nombre de usuario y contraseña.");
			location.href="index.php";
		</script>';
	}
	else {
		$query="SELECT nombre_profesor FROM profesor where id_profesor='".$_SESSION['user']."'";
		$resultado=pg_query($query,$cn);
		$profesor=pg_fetch_array($resultado);
		echo'<!DOCTYPE html>
			<html>
				<head>
					<title>Administración de salas - SO4</title>
					<link rel="stylesheet" type="text/css" media="screen" href="css/estilos.css" />
					<link rel="stylesheet" type="text/css" media="screen" href="css/estilosCSS3.css" />
					<link rel="stylesheet" type="text/css" media="screen" href="css/estiloSO4.css" />
					<link type="image/x-icon" rel="shortcut icon" href="http://cesramonycajal.com/cesramonycajal/templates/ja_purity/favicon.ico">
					<!-- Bootstrap -->
					<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
					<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-responsive.min.css" />
					<script type="text/javascript" src="js/bootstrap.min.js"></script>
				</head>
				<body>
					<div id="contenedor" class="container">
						<header>
							<div id="logoSO">
								<img src="img/logo.png" alt="logo" />
							</div>
							<h1>Parte de incidencias sala ordenadores 4</h1>
							<form id="formCerrar" action="cerrar.php" method="post">
								<div id="divCerrar">
									<input type="submit" id="btnCerrar" name="btnCerrar" value="Salir" class="btn btn-danger" />
								</div>
							</form>
							<form id="formIncidencia" action="enviarParte.php" method="post">
								<table cellspacing="0" class="table table-bordered">
									<tr>
										<th>Curso: '.lista_cursos_required("").'</th>
										<th>Profesor: <input type="text" name="profesor" disabled="disabled" value="'.$profesor['nombre_profesor'].'" class="uneditable-input" /></th>
										<th>Fecha: <input type="date" name="fechaParte" placeholder="Formato: aaaa-mm-dd" class="input-medium" required /></th>
										<th>Hora: <select id="horaParte" name="horaParte" required >
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
										</th>
									</tr>
								</table>
								<div id="divEnviar">
									<input type="hidden" name="sala" value="4" />
									<input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar" class="btn btn-success" />
								</div>
							</form>
						</header>
						<section class="ordenadores">
							<div id="pc15" class="ordenador sombraOrdenador">
								<p>Ordenador 15</p>
								<input type="hidden" name="nombrePC15" value="Ordenador 15" form="formIncidencia" />
								<input type="hidden" name="idPC15" value="pc15" form="formIncidencia" />
								<textarea name="alumnosPC15" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC15" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc14" class="ordenador sombraOrdenador">
								<p>Ordenador 14</p>
								<input type="hidden" name="nombrePC14" value="Ordenador 14" form="formIncidencia" />
								<input type="hidden" name="idPC14" value="pc14" form="formIncidencia" />
								<textarea name="alumnosPC14" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC14" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc13" class="ordenador sombraOrdenador">
								<p>Ordenador 13</p>
								<input type="hidden" name="nombrePC13" value="Ordenador 13" form="formIncidencia" />
								<input type="hidden" name="idPC13" value="pc13" form="formIncidencia" />
								<textarea name="alumnosPC13" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC13" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc12" class="ordenador sombraOrdenador">
								<p>Ordenador 12</p>
								<input type="hidden" name="nombrePC12" value="Ordenador 12" form="formIncidencia" />
								<input type="hidden" name="idPC12" value="pc12" form="formIncidencia" />
								<textarea name="alumnosPC12" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC12" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc11" class="ordenador sombraOrdenador">
								<p>Ordenador 11</p>
								<input type="hidden" name="nombrePC11" value="Ordenador 11" form="formIncidencia" />
								<input type="hidden" name="idPC11" value="pc11" form="formIncidencia" />
								<textarea name="alumnosPC11" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC11" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc10" class="ordenador sombraOrdenador">
								<p>Ordenador 10</p>
								<input type="hidden" name="nombrePC10" value="Ordenador 10" form="formIncidencia" />
								<input type="hidden" name="idPC10" value="pc10" form="formIncidencia" />
								<textarea name="alumnosPC10" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC10" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc9" class="ordenador sombraOrdenador">
								<p>Ordenador 9</p>
								<input type="hidden" name="nombrePC9" value="Ordenador 9" form="formIncidencia" />
								<input type="hidden" name="idPC9" value="pc9" form="formIncidencia" />
								<textarea name="alumnosPC9" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC9" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc8" class="ordenador sombraOrdenador">
								<p>Ordenador 8</p>
								<input type="hidden" name="nombrePC8" value="Ordenador 8" form="formIncidencia" />
								<input type="hidden" name="idPC8" value="pc8" form="formIncidencia" />
								<textarea name="alumnosPC8" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC8" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc7" class="ordenador sombraOrdenador">
								<p>Ordenador 7</p>
								<input type="hidden" name="nombrePC7" value="Ordenador 7" form="formIncidencia" />
								<input type="hidden" name="idPC7" value="pc7" form="formIncidencia" />
								<textarea name="alumnosPC7" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC7" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc6" class="ordenador sombraOrdenador">
								<p>Ordenador 6</p>
								<input type="hidden" name="nombrePC6" value="Ordenador 6" form="formIncidencia" />
								<input type="hidden" name="idPC6" value="pc6" form="formIncidencia" />
								<textarea name="alumnosPC6" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC6" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc5" class="ordenador sombraOrdenador">
								<p>Ordenador 5</p>
								<input type="hidden" name="nombrePC5" value="Ordenador 5" form="formIncidencia" />
								<input type="hidden" name="idPC5" value="pc5" form="formIncidencia" />
								<textarea name="alumnosPC5" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC5" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc4" class="ordenador sombraOrdenador">
								<p>Ordenador 4</p>
								<input type="hidden" name="nombrePC4" value="Ordenador 4" form="formIncidencia" />
								<input type="hidden" name="idPC4" value="pc4" form="formIncidencia" />
								<textarea name="alumnosPC4" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC4" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc3" class="ordenador sombraOrdenador">
								<p>Ordenador 3</p>
								<input type="hidden" name="nombrePC3" value="Ordenador 3" form="formIncidencia" />
								<input type="hidden" name="idPC3" value="pc3" form="formIncidencia" />
								<textarea name="alumnosPC3" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC3" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc2" class="ordenador sombraOrdenador">
								<p>Ordenador 2</p>
								<input type="hidden" name="nombrePC2" value="Ordenador 2" form="formIncidencia" />
								<input type="hidden" name="idPC2" value="pc2" form="formIncidencia" />
								<textarea name="alumnosPC2" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC2" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="pc1" class="ordenador sombraOrdenador">
								<p>Ordenador 1</p>
								<input type="hidden" name="nombrePC1" value="Ordenador 1" form="formIncidencia" />
								<input type="hidden" name="idPC1" value="pc1" form="formIncidencia" />
								<textarea name="alumnosPC1" placeholder="Alumnos" rows="1" form="formIncidencia" ></textarea>
								<textarea name="incidenciasPC1" placeholder="Incidencias" rows="3" form="formIncidencia" ></textarea>
							</div>
							<div id="observaciones" class="observaciones sombraOrdenador">
								<textarea name="observaciones" placeholder="Observaciones" rows="9" class="input-xxlarge" form="formIncidencia" ></textarea>
							</div>
							<div id="pc0" class="ordenador sombraOrdenador">
								<p>Ordenador Profesor</p>
								<input type="hidden" name="nombrePC0" value="Ordenador Profesor" form="formIncidencia" />
								<input type="hidden" name="idPC0" value="pc0" form="formIncidencia" />
								<textarea name="incidenciasPC0" placeholder="Incidencias" rows="7" form="formIncidencia" ></textarea>
							</div>
						</section>
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
			</html>';
	}
?>