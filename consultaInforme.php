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
		if ((isset($_POST['fechaFormFH'])) || (isset($_POST['horaFormFH'])) || (isset($_POST['codigosala']))){
			$fechaFormFH=(isset($_REQUEST['fechaFormFH']))  ?  $_REQUEST['fechaFormFH'] : "";
			$horaFormFH=(isset($_REQUEST['horaFormFH']))  ?  $_REQUEST['horaFormFH'] : "";
			$codigosala=(isset($_REQUEST['codigosala']))  ?  $_REQUEST['codigosala'] : "";
			$condicion="1=1";
			if ($fechaFormFH!="")
				$condicion=$condicion." AND fecha LIKE '%$fechaFormFH%'";
			if ($horaFormFH!="")
				$condicion=$condicion." AND hora LIKE '%$horaFormFH%'";
			if ($codigosala!="")
				$condicion=$condicion." AND sala.id_sala LIKE '%$codigosala%'";
			$consulta="SELECT id_parte, observaciones, resuelto, id_pc, nombre, alumnos, incidencias, nombre_curso, nombre_sala, nombre_profesor FROM parte INNER JOIN pc INNER JOIN curso INNER JOIN sala INNER JOIN profesor ON parte.id_parte=pc.cod_parte AND parte.cod_curso=curso.id_curso AND parte.cod_sala=sala.id_sala AND parte.cod_profesor=profesor.id_profesor WHERE $condicion";
			$resultado=pg_query($consulta,$cn);
			$i=0;
			while ($reg=pg_fetch_array($resultado)){
					if ($reg['id_pc']=="pc1"){
				echo '<table cellspacing="0" class="table table-striped table-hover">
					<tr>
						<th width="56px">Nº parte</th>
						<th>Nombre PC</th>
						<th>Alumnos</th>
						<th>Incidencias del PC</th>
						<th>Curso</th>
						<th>Profesor al cargo</th>
						<th>Observaciones del parte</th>
						<th>¿Parte resuelto?</th>
					</tr>
					<tr>
						<td>'.$reg['id_parte'].'</td>';
					}
					else {
						echo "<td></td>";
					}
					echo "<td>".$reg['nombre']."</td>
					<td>".$reg['alumnos']."</td>
					<td>".$reg['incidencias']."</td>
					<td>".$reg['nombre_curso']."</td>
					<td>".$reg['nombre_profesor']."</td>";
					if ($reg['observaciones']==""){
						echo "<td> No hay observaciones para este parte</td>";
					}
					else{
						echo "<td>".$reg['observaciones']."</td>";
					}
					if ($reg['id_pc']=="pc1"){				
						echo '<td>
							<form id="formIncidenciaResuelta'.$i.'" method="post" action="">
								
									<input type="checkbox" id="idParteResuelto" name="idParteResuelto" value="'.$reg['resuelto'].'" onchange="cambiaCheck(this);" class="checkbox inline" />
								
								<input type="hidden" id="idParteResolver" name="idParteResolver" value="'.$reg['id_parte'].'" />
								<input type="submit" value="Resuelto" id="btnResuelto" name="btnResuelto" class="btn btn-success" />
							</form>
						</td>
						<script type="text/javascript">
							compruebaCheck();
						</script>';
						$i++;
					}
					else {
						echo "<td></td>";
					}
					if ($reg['id_pc']=="pc0"){
					echo '</tr>';
			echo '</table>';
					}
					else{
					echo '</tr>';
					}
			}			pg_free_result($resultado);
			pg_close($cn);
		}
		if (isset($_POST['codigoprofesor'])){
			$idProfesor=$_REQUEST['codigoprofesor'];
			$consulta="SELECT count(cod_profesor) AS partes, nombre_profesor FROM parte INNER JOIN profesor ON parte.cod_profesor=profesor.id_profesor WHERE id_profesor='".$idProfesor."'";
			$resultado=pg_query($consulta,$cn);
			while ($res=pg_fetch_array($resultado)){
				echo '<p>El profesor '.$res['nombre_profesor'].' ha enviado '.$res['partes'].' parte(s).</p>';
			}			pg_free_result($resultado);
		}
		if ((isset($_POST['pcIncidencia'])) || (isset($_POST['codigosalaIncidencias']))){
			$pcIncidencia=$_REQUEST['pcIncidencia'];
			$codigosalaIncidencias=$_REQUEST['codigosalaIncidencias'];
			$consulta='SELECT fecha, nombre, alumnos, incidencias, nombre_sala FROM parte INNER JOIN pc INNER JOIN sala ON parte.id_parte=pc.cod_parte AND parte.cod_sala=sala.id_sala WHERE pc.id_pc="'.$pcIncidencia.'" AND sala.id_sala="'.$codigosalaIncidencias.'" ORDER BY fecha DESC';
			$resultado=pg_query($consulta,$cn);
			$filas=pg_num_rows($resultado);
			if($filas!=0){
				echo '<p>El pc seleccionado ha tenido las siguientes incidencias en la sala escogida</p>
				<table cellspacing="0" class="table table-striped table-hover">
					<tr>
						<th width="80px">Fecha</th>
						<th>Alumnos</th>
						<th>Incidencias</th>
					</tr>';
				while ($res=pg_fetch_array($resultado)){
					echo '<tr>
						<td>'.$res['fecha'].'</td>
						<td>'.$res['alumnos'].'</td>
						<td>'.$res['incidencias'].'</td>
					</tr>';
				}
				echo '</table>';
			}			pg_free_result($resultado);
			else{
				echo '<p>El pc seleccionado no ha tenido ninguna incidencia en la sala escogida</p>';
			}
		}
	}
?>