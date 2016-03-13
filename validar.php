<?php
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	require_once("conexion.php");
	require_once("funciones.php");
	if (isset($_REQUEST['profesor'])){
		$profesor=$_REQUEST['profesor'];
	}
	else{
		$profesor="";
	}
	if (isset($_REQUEST['password'])){
		$password=$_REQUEST['password'];
	}
	else{
		$password="";
	}
	if (isset($_REQUEST['so'])){
		$aula=$_REQUEST['so'];
	}
	else{
		$aula="";
	}
	$_SESSION['user']=$profesor;
	$idProfesor=buscaUsuario($profesor,$password);
	if (($profesor=='adm')&&($idProfesor==1)){
		header ("Location: administracion.php");
	}
	else if ($idProfesor==0){
		echo '<script>
			alert("Lo sentimos, el usuario o la contraseña son incorrectos.\n\nPor favor, vuelva a introducir su nombre de usuario y contraseña.");
			location.href="index.php";
		</script>';
		session_unset();
		session_destroy();
	}
	else{
		redirigeAula($aula);
	}
?>