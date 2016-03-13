<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
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
		if ((isset($_POST['ParteResuelto'])) && (isset($_POST['ParteResolver']))){
			$parteResuelto=$_REQUEST['ParteResuelto'];
			$idParteResuelto=$_REQUEST['ParteResolver'];
			$consulta='UPDATE parte SET resuelto="'.$parteResuelto.'" WHERE id_parte="'.$idParteResuelto.'"';
			$respuesta=pg_query($consulta,$cn) or die ("Error, no se pudo modificar el parte".pg_last_error());
			echo '<script type="text/javascript">
				alert("El parte se ha resuelto con éxito.\n\nSe le redirigirá al índice de la administración.");
				location.href="administracion.php";
			</script>';
		}
	}
?>