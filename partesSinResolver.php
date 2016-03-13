<?php
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
		$consulta="SELECT COUNT(*) AS partesSinResolver FROM parte WHERE resuelto='No'";
		$resultado=pg_query($consulta,$cn);
		$filas=pg_num_rows($resultado);
		$res=pg_fetch_array($resultado);
		if($res['partesSinResolver']!=0){
			echo 'Partes sin resolver: <span>'.$res['partesSinResolver'].'</span>';
		}
		else{
			echo 'No queda ningún parte sin resolver';
		}
	}
?>