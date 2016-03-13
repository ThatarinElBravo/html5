<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
	require_once("conexion.php");
	echo'<!DOCTYPE html>
		<html>
			<head>
				<title>Administración de salas - Login</title>
				<link rel="stylesheet" type="text/css" media="screen" href="css/estilos.css" />
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
					<div id="logo">
						<img src="img/logo.png" alt="logo" />
					</div>
					<form id="formLogin" action="validar.php" method="post">
						<div id="login">
							<p>Identifíquese</p>
							<input name="profesor" type="text" value="" size="21px" required autofocus autocomplete="off" placeholder="Código profesor"/>
							<br/>
							<input name="password" type="password" value="" size="21px"required autocomplete="off" placeholder="Contraseña"/>
							<br/>
							<select id="so" name="so" required>
								<option value="" selected="selected">-Seleccione un aula-</option>
								<option value="so1">SO1</option>
								<option value="so2">SO2</option>
								<option value="so3">SO3</option>
								<option value="so4">SO4</option>
								<option value="so5">SO5</option>
							</select>
							<br/>
							<input type="submit" value="Entrar" class="btn" />
						</div>
					</form>
				</div>
			</body>
		</html>';
?>