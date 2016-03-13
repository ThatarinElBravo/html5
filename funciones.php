<?php
	function lista_cursos($valor){
		$sql="SELECT * FROM curso";
		$registros=pg_query($sql);
		$html="<select id='alumnosBuscar' name='codigocurso'>";
		$html=$html. "<option value='' >Seleccione curso...</option>";
		while ($reg = pg_fetch_array($registros)) {
			if ($reg['id_curso']==$valor)
				$html=$html. "<option value='$reg[id_curso]' selected='selected'>$reg[nombre_curso]</option>" ;
			else
				$html=$html. "<option value='$reg[id_curso]'>$reg[nombre_curso]</option>" ;
		}
		$html=$html. "</select>";
		return $html;
	}
	function lista_cursos_required($valor){
		$sql="SELECT * FROM curso";
		$registros=pg_query($sql);
		$html="<select id='alumnosBuscar' name='codigocurso' required>";
		$html=$html. "<option value='' >Seleccione curso...</option>";
		while ($reg = pg_fetch_array($registros)) {
			if ($reg['id_curso']==$valor)
				$html=$html. "<option value='$reg[id_curso]' selected='selected'>$reg[nombre_curso]</option>" ;
			else
				$html=$html. "<option value='$reg[id_curso]'>$reg[nombre_curso]</option>" ;
		}
		$html=$html. "</select>";
		return $html;
	}
	function lista_salas($valor){
		$sql="SELECT * FROM sala";
		$registros=pg_query($sql);
		$html="<select id='salaBuscar' name='codigosala' class='input-medium' >";
		$html=$html. "<option value='' >Seleccione sala...</option>";
		while ($reg = pg_fetch_array($registros)) {
			if ($reg['id_sala']==$valor)
				$html=$html. "<option value='$reg[id_sala]' selected='selected'>$reg[nombre_sala]</option>" ;
			else
				$html=$html. "<option value='$reg[id_sala]'>$reg[nombre_sala]</option>" ;
		}
		$html=$html. "</select>";
		return $html;
	}
	function lista_salas_incidencias($valor){
		$sql="SELECT * FROM sala";
		$registros=pg_query($sql);
		$html="<select id='salaBuscarIncidencia' name='codigosalaIncidencias' class='input-medium' >";
		$html=$html. "<option value='' >Seleccione sala...</option>";
		while ($reg = pg_fetch_array($registros)) {
			if ($reg['id_sala']==$valor)
				$html=$html. "<option value='$reg[id_sala]' selected='selected'>$reg[nombre_sala]</option>" ;
			else
				$html=$html. "<option value='$reg[id_sala]'>$reg[nombre_sala]</option>" ;
		}
		$html=$html. "</select>";
		return $html;
	}
	function lista_profesores($valor){
		$sql="SELECT * FROM profesor";
		$registros=pg_query($sql);
		$html="<select id='profesorBuscar' name='codigoprofesor' class='input-large' >";
		$html=$html. "<option value='' >Seleccione profesor...</option>";
		while ($reg = pg_fetch_array($registros)) {
			if ($reg['id_profesor']==$valor)
				$html=$html. "<option value='$reg[id_profesor]' selected='selected'>$reg[nombre_profesor]</option>" ;
			else
				$html=$html. "<option value='$reg[id_profesor]'>$reg[nombre_profesor]</option>" ;
		}
		$html=$html. "</select>";
		return $html;
	}
	function buscaUsuario ($profesor, $password){
		$query = "SELECT * FROM profesor WHERE id_profesor='".$profesor."'";
		$result = pg_query($query) or die ("Error. No existe el usuario o la contraseña es incorrecta.");
		if($result){
			if ($line = pg_fetch_array($result)) {
				$passw = $line["password"];
			}
			else{
				return 0;
			}
			pg_free_result($result);
			if($passw==$password){
				return 1;
			}
			else{
				return 0;
			}
		}
		else{
			return 0;
		}
		pg_close($cn);
	}
	function buscaUsuarioNombre ($profesor){
		$query = "SELECT id_profesor FROM profesor WHERE nombre_profesor='".$profesor."'";
		$result = pg_query($query);
		if($result){
			if ($line = pg_fetch_array($result)) {
				return $line["id_profesor"];
			}
			else{
				return 0;
			}
			pg_free_result($result);
		}
		else{
			return 0;
		}
		pg_close($cn);
	}
	function buscaParte ($fecha,$hora){
		$query="SELECT id_parte FROM parte WHERE fecha='".$fecha."' AND hora= '".$hora."'";
		$result = pg_query($query);
		if($result){
			if ($line = pg_fetch_array($result)) {
				return $line["id_parte"];
			}
			else{
				return 0;
			}
			pg_free_result($result);
		}
		else{
			return 0;
		}
		pg_close($cn);
	}
	function redirigeAula($so){
		if ($so=="so1"){
			header ("Location: so1.php");
		}
		else if ($so=="so2"){
			header ("Location: so2.php");
		}
		else if ($so=="so3"){
			header ("Location: so3.php");
		}
		else if ($so=="so4"){
			header ("Location: so4.php");
		}
		else{
			header ("Location: so5.php");
		}
	}
?>