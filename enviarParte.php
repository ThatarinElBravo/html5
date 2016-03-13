<?php
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
		if (isset($_REQUEST['codigocurso'])){
			$codigoCurso=$_REQUEST['codigocurso'];
		}
		else{
			$codigoCurso="";
		}
		if (isset($_REQUEST['sala'])){
			$sala=$_REQUEST['sala'];
		}
		else{
			$sala="";
		}
		if (isset($_REQUEST['profesor'])){
			$profesor=$_REQUEST['profesor'];
		}
		else{
			$profesor="";
		}
		if (isset($_REQUEST['fechaParte'])){
			$fechaParte=$_REQUEST['fechaParte'];
		}
		else{
			$fechaParte="";
		}
		if (isset($_REQUEST['horaParte'])){
			$horaParte=$_REQUEST['horaParte'];
		}
		else{
			$horaParte="";
		}
		// Comienzo de recogida de datos de los ordenadores.
		// PC15
		if (isset($_REQUEST['nombrePC15'])){
			$nombrePC15=$_REQUEST['nombrePC15'];
		}
		else{
			$nombrePC15="";
		}
		if (isset($_REQUEST['idPC15'])){
			$idPC15=$_REQUEST['idPC15'];
		}
		else{
			$idPC15="";
		}
		if (isset($_REQUEST['alumnosPC15'])){
			$alumnosPC15=$_REQUEST['alumnosPC15'];
		}
		else{
			$alumnosPC15="";
		}
		if (isset($_REQUEST['incidenciasPC15'])){
			$incidenciasPC15=$_REQUEST['incidenciasPC15'];
		}
		else{
			$incidenciasPC15="";
		}
		// PC14
		if (isset($_REQUEST['nombrePC14'])){
			$nombrePC14=$_REQUEST['nombrePC14'];
		}
		else{
			$nombrePC14="";
		}
		if (isset($_REQUEST['idPC14'])){
			$idPC14=$_REQUEST['idPC14'];
		}
		else{
			$idPC14="";
		}
		if (isset($_REQUEST['alumnosPC14'])){
			$alumnosPC14=$_REQUEST['alumnosPC14'];
		}
		else{
			$alumnosPC14="";
		}
		if (isset($_REQUEST['incidenciasPC14'])){
			$incidenciasPC14=$_REQUEST['incidenciasPC14'];
		}
		else{
			$incidenciasPC14="";
		}
		// PC13
		if (isset($_REQUEST['nombrePC13'])){
			$nombrePC13=$_REQUEST['nombrePC13'];
		}
		else{
			$nombrePC13="";
		}
		if (isset($_REQUEST['idPC13'])){
			$idPC13=$_REQUEST['idPC13'];
		}
		else{
			$idPC13="";
		}
		if (isset($_REQUEST['alumnosPC13'])){
			$alumnosPC13=$_REQUEST['alumnosPC13'];
		}
		else{
			$alumnosPC13="";
		}
		if (isset($_REQUEST['incidenciasPC13'])){
			$incidenciasPC13=$_REQUEST['incidenciasPC13'];
		}
		else{
			$incidenciasPC13="";
		}
		// PC12
		if (isset($_REQUEST['nombrePC12'])){
			$nombrePC12=$_REQUEST['nombrePC12'];
		}
		else{
			$nombrePC12="";
		}
		if (isset($_REQUEST['idPC12'])){
			$idPC12=$_REQUEST['idPC12'];
		}
		else{
			$idPC12="";
		}
		if (isset($_REQUEST['alumnosPC12'])){
			$alumnosPC12=$_REQUEST['alumnosPC12'];
		}
		else{
			$alumnosPC12="";
		}
		if (isset($_REQUEST['incidenciasPC12'])){
			$incidenciasPC12=$_REQUEST['incidenciasPC12'];
		}
		else{
			$incidenciasPC12="";
		}
		// PC11
		if (isset($_REQUEST['nombrePC11'])){
			$nombrePC11=$_REQUEST['nombrePC11'];
		}
		else{
			$nombrePC11="";
		}
		if (isset($_REQUEST['idPC11'])){
			$idPC11=$_REQUEST['idPC11'];
		}
		else{
			$idPC11="";
		}
		if (isset($_REQUEST['alumnosPC11'])){
			$alumnosPC11=$_REQUEST['alumnosPC11'];
		}
		else{
			$alumnosPC11="";
		}
		if (isset($_REQUEST['incidenciasPC11'])){
			$incidenciasPC11=$_REQUEST['incidenciasPC11'];
		}
		else{
			$incidenciasPC11="";
		}
		// PC10
		if (isset($_REQUEST['nombrePC10'])){
			$nombrePC10=$_REQUEST['nombrePC10'];
		}
		else{
			$nombrePC10="";
		}
		if (isset($_REQUEST['idPC10'])){
			$idPC10=$_REQUEST['idPC10'];
		}
		else{
			$idPC10="";
		}
		if (isset($_REQUEST['alumnosPC10'])){
			$alumnosPC10=$_REQUEST['alumnosPC10'];
		}
		else{
			$alumnosPC10="";
		}
		if (isset($_REQUEST['incidenciasPC10'])){
			$incidenciasPC10=$_REQUEST['incidenciasPC10'];
		}
		else{
			$incidenciasPC10="";
		}
		// PC9
		if (isset($_REQUEST['nombrePC9'])){
			$nombrePC9=$_REQUEST['nombrePC9'];
		}
		else{
			$nombrePC9="";
		}
		if (isset($_REQUEST['idPC9'])){
			$idPC9=$_REQUEST['idPC9'];
		}
		else{
			$idPC9="";
		}
		if (isset($_REQUEST['alumnosPC9'])){
			$alumnosPC9=$_REQUEST['alumnosPC9'];
		}
		else{
			$alumnosPC9="";
		}
		if (isset($_REQUEST['incidenciasPC9'])){
			$incidenciasPC9=$_REQUEST['incidenciasPC9'];
		}
		else{
			$incidenciasPC9="";
		}
		// PC8
		if (isset($_REQUEST['nombrePC8'])){
			$nombrePC8=$_REQUEST['nombrePC8'];
		}
		else{
			$nombrePC8="";
		}
		if (isset($_REQUEST['idPC8'])){
			$idPC8=$_REQUEST['idPC8'];
		}
		else{
			$idPC8="";
		}
		if (isset($_REQUEST['alumnosPC8'])){
			$alumnosPC8=$_REQUEST['alumnosPC8'];
		}
		else{
			$alumnosPC8="";
		}
		if (isset($_REQUEST['incidenciasPC8'])){
			$incidenciasPC8=$_REQUEST['incidenciasPC8'];
		}
		else{
			$incidenciasPC8="";
		}
		// PC7
		if (isset($_REQUEST['nombrePC7'])){
			$nombrePC7=$_REQUEST['nombrePC7'];
		}
		else{
			$nombrePC7="";
		}
		if (isset($_REQUEST['idPC7'])){
			$idPC7=$_REQUEST['idPC7'];
		}
		else{
			$idPC7="";
		}
		if (isset($_REQUEST['alumnosPC7'])){
			$alumnosPC7=$_REQUEST['alumnosPC7'];
		}
		else{
			$alumnosPC7="";
		}
		if (isset($_REQUEST['incidenciasPC7'])){
			$incidenciasPC7=$_REQUEST['incidenciasPC7'];
		}
		else{
			$incidenciasPC7="";
		}
		// PC6
		if (isset($_REQUEST['nombrePC6'])){
			$nombrePC6=$_REQUEST['nombrePC6'];
		}
		else{
			$nombrePC6="";
		}
		if (isset($_REQUEST['idPC6'])){
			$idPC6=$_REQUEST['idPC6'];
		}
		else{
			$idPC6="";
		}
		if (isset($_REQUEST['alumnosPC6'])){
			$alumnosPC6=$_REQUEST['alumnosPC6'];
		}
		else{
			$alumnosPC6="";
		}
		if (isset($_REQUEST['incidenciasPC6'])){
			$incidenciasPC6=$_REQUEST['incidenciasPC6'];
		}
		else{
			$incidenciasPC6="";
		}
		// PC5
		if (isset($_REQUEST['nombrePC5'])){
			$nombrePC5=$_REQUEST['nombrePC5'];
		}
		else{
			$nombrePC5="";
		}
		if (isset($_REQUEST['idPC5'])){
			$idPC5=$_REQUEST['idPC5'];
		}
		else{
			$idPC5="";
		}
		if (isset($_REQUEST['alumnosPC5'])){
			$alumnosPC5=$_REQUEST['alumnosPC5'];
		}
		else{
			$alumnosPC5="";
		}
		if (isset($_REQUEST['incidenciasPC5'])){
			$incidenciasPC5=$_REQUEST['incidenciasPC5'];
		}
		else{
			$incidenciasPC5="";
		}
		// PC4
		if (isset($_REQUEST['nombrePC4'])){
			$nombrePC4=$_REQUEST['nombrePC4'];
		}
		else{
			$nombrePC4="";
		}
		if (isset($_REQUEST['idPC4'])){
			$idPC4=$_REQUEST['idPC4'];
		}
		else{
			$idPC4="";
		}
		if (isset($_REQUEST['alumnosPC4'])){
			$alumnosPC4=$_REQUEST['alumnosPC4'];
		}
		else{
			$alumnosPC4="";
		}
		if (isset($_REQUEST['incidenciasPC4'])){
			$incidenciasPC4=$_REQUEST['incidenciasPC4'];
		}
		else{
			$incidenciasPC4="";
		}
		// PC3
		if (isset($_REQUEST['nombrePC3'])){
			$nombrePC3=$_REQUEST['nombrePC3'];
		}
		else{
			$nombrePC3="";
		}
		if (isset($_REQUEST['idPC3'])){
			$idPC3=$_REQUEST['idPC3'];
		}
		else{
			$idPC3="";
		}
		if (isset($_REQUEST['alumnosPC3'])){
			$alumnosPC3=$_REQUEST['alumnosPC3'];
		}
		else{
			$alumnosPC3="";
		}
		if (isset($_REQUEST['incidenciasPC3'])){
			$incidenciasPC3=$_REQUEST['incidenciasPC3'];
		}
		else{
			$incidenciasPC3="";
		}
		// PC2
		if (isset($_REQUEST['nombrePC2'])){
			$nombrePC2=$_REQUEST['nombrePC2'];
		}
		else{
			$nombrePC2="";
		}
		if (isset($_REQUEST['idPC2'])){
			$idPC2=$_REQUEST['idPC2'];
		}
		else{
			$idPC2="";
		}
		if (isset($_REQUEST['alumnosPC2'])){
			$alumnosPC2=$_REQUEST['alumnosPC2'];
		}
		else{
			$alumnosPC2="";
		}
		if (isset($_REQUEST['incidenciasPC2'])){
			$incidenciasPC2=$_REQUEST['incidenciasPC2'];
		}
		else{
			$incidenciasPC2="";
		}
		// PC1
		if (isset($_REQUEST['nombrePC1'])){
			$nombrePC1=$_REQUEST['nombrePC1'];
		}
		else{
			$nombrePC1="";
		}
		if (isset($_REQUEST['idPC1'])){
			$idPC1=$_REQUEST['idPC1'];
		}
		else{
			$idPC1="";
		}
		if (isset($_REQUEST['alumnosPC1'])){
			$alumnosPC1=$_REQUEST['alumnosPC1'];
		}
		else{
			$alumnosPC1="";
		}
		if (isset($_REQUEST['incidenciasPC1'])){
			$incidenciasPC1=$_REQUEST['incidenciasPC1'];
		}
		else{
			$incidenciasPC1="";
		}
		// PCprofesor
		if (isset($_REQUEST['nombrePC0'])){
			$nombrePCprofesor=$_REQUEST['nombrePC0'];
		}
		else{
			$nombrePCprofesor="";
		}
		if (isset($_REQUEST['idPC0'])){
			$idPCprofesor=$_REQUEST['idPC0'];
		}
		else{
			$idPCprofesor="";
		}
		if (isset($_REQUEST['incidenciasPC0'])){
			$incidenciasPCprofesor=$_REQUEST['incidenciasPC0'];
		}
		else{
			$incidenciasPCprofesor="";
		}
		// Observaciones		
		if (isset($_REQUEST['observaciones'])){
			$observaciones=$_REQUEST['observaciones'];
		}
		else{
			$observaciones="";
		}
		// Inserción de datos
		$id_profesor=$_SESSION['user'];
		$queryParte="insert into parte (fecha, hora, observaciones, cod_curso, cod_profesor, cod_sala) values ('".$fechaParte."','".$horaParte."','".$observaciones."','".$codigoCurso."','".$id_profesor."','".$sala."')";
		pg_query($queryParte,$cn) or die("Problemas en el insert del parte: ".pg_last_error());
		$cod_parte=buscaParte($fechaParte,$horaParte);
		// PC1
		if (($alumnosPC1!="")||($incidenciasPC1!="")){
			$queryPC1="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC1."','".$nombrePC1."','".$alumnosPC1."','".$incidenciasPC1."','".$cod_parte."')";
			pg_query($queryPC1,$cn) or die("Problemas en el insert del PC1: ".pg_last_error());
		}
		// PC2
		if (($alumnosPC2!="")||($incidenciasPC2!="")){
			$queryPC2="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC2."','".$nombrePC2."','".$alumnosPC2."','".$incidenciasPC2."','".$cod_parte."')";
			pg_query($queryPC2,$cn) or die("Problemas en el insert del PC2: ".pg_last_error());
		}
		// PC3
		if (($alumnosPC3!="")||($incidenciasPC3!="")){
			$queryPC3="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC3."','".$nombrePC3."','".$alumnosPC3."','".$incidenciasPC3."','".$cod_parte."')";
			pg_query($queryPC3,$cn) or die("Problemas en el insert del PC3: ".pg_last_error());
		}
		// PC4
		if (($alumnosPC4!="")||($incidenciasPC4!="")){
			$queryPC4="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC4."','".$nombrePC4."','".$alumnosPC4."','".$incidenciasPC4."','".$cod_parte."')";
			pg_query($queryPC4,$cn) or die("Problemas en el insert del PC4: ".pg_last_error());
		}
		// PC5
		if (($alumnosPC5!="")||($incidenciasPC5!="")){
			$queryPC5="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC5."','".$nombrePC5."','".$alumnosPC5."','".$incidenciasPC5."','".$cod_parte."')";
			pg_query($queryPC5,$cn) or die("Problemas en el insert del PC5: ".pg_last_error());
		}
		// PC6
		if (($alumnosPC6!="")||($incidenciasPC6!="")){
			$queryPC6="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC6."','".$nombrePC6."','".$alumnosPC6."','".$incidenciasPC6."','".$cod_parte."')";
			pg_query($queryPC6,$cn) or die("Problemas en el insert del PC6: ".pg_last_error());
		}
		// PC7
		if (($alumnosPC7!="")||($incidenciasPC7!="")){
			$queryPC7="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC7."','".$nombrePC7."','".$alumnosPC7."','".$incidenciasPC7."','".$cod_parte."')";
			pg_query($queryPC7,$cn) or die("Problemas en el insert del PC7: ".pg_last_error());
		}
		// PC8
		if (($alumnosPC8!="")||($incidenciasPC8!="")){
			$queryPC8="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC8."','".$nombrePC8."','".$alumnosPC8."','".$incidenciasPC8."','".$cod_parte."')";
			pg_query($queryPC8,$cn) or die("Problemas en el insert del PC8: ".pg_last_error());
		}
		// PC9
		if (($alumnosPC9!="")||($incidenciasPC9!="")){
			$queryPC9="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC9."','".$nombrePC9."','".$alumnosPC9."','".$incidenciasPC9."','".$cod_parte."')";
			pg_query($queryPC9,$cn) or die("Problemas en el insert del PC9: ".pg_last_error());
		}
		// PC10
		if (($alumnosPC10!="")||($incidenciasPC10!="")){
			$queryPC10="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC10."','".$nombrePC10."','".$alumnosPC10."','".$incidenciasPC10."','".$cod_parte."')";
			pg_query($queryPC10,$cn) or die("Problemas en el insert del PC10: ".pg_last_error());
		}
		// PC11
		if (($alumnosPC11!="")||($incidenciasPC11!="")){
			$queryPC11="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC11."','".$nombrePC11."','".$alumnosPC11."','".$incidenciasPC11."','".$cod_parte."')";
			pg_query($queryPC11,$cn) or die("Problemas en el insert del PC11: ".pg_last_error());
		}
		// PC12
		if (($alumnosPC12!="")||($incidenciasPC12!="")){
			$queryPC12="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC12."','".$nombrePC12."','".$alumnosPC12."','".$incidenciasPC12."','".$cod_parte."')";
			pg_query($queryPC12,$cn) or die("Problemas en el insert del PC12: ".pg_last_error());
		}
		// PC13
		if (($alumnosPC13!="")||($incidenciasPC13!="")){
			$queryPC13="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC13."','".$nombrePC13."','".$alumnosPC13."','".$incidenciasPC13."','".$cod_parte."')";
			pg_query($queryPC13,$cn) or die("Problemas en el insert del PC13: ".pg_last_error());
		}
		// PC14
		if (($alumnosPC14!="")||($incidenciasPC14!="")){
			$queryPC14="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC14."','".$nombrePC14."','".$alumnosPC14."','".$incidenciasPC14."','".$cod_parte."')";
			pg_query($queryPC14,$cn) or die("Problemas en el insert del PC14: ".pg_last_error());
		}
		// PC15
		if (($alumnosPC15!="")||($incidenciasPC15!="")){
			$queryPC15="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPC15."','".$nombrePC15."','".$alumnosPC15."','".$incidenciasPC15."','".$cod_parte."')";
			pg_query($queryPC15,$cn) or die("Problemas en el insert del PC15: ".pg_last_error());
		}
		// PC0
		if ($incidenciasPCprofesor!=""){
			$queryPC0="insert into pc (id_pc, nombre, alumnos, incidencias, cod_parte) values ('".$idPCprofesor."','".$nombrePCprofesor."','','".$incidenciasPCprofesor."','".$cod_parte."')";
			pg_query($queryPC0,$cn) or die("Problemas en el insert del PC0: ".pg_last_error());
		}
		pg_close($cn);
		echo '<html>
			<body>
				<script type="text/javascript>			
					alert("El parte se ha enviado con éxito.\n\nSu sesión será finalizada inmediatamente.");
					location.href="index.php";
				</script>
			</body>
		</html>';
		session_unset();
		session_destroy();
	}
?>