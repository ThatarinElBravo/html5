$(document).ready(function() {
	setInterval(function() { 
		$("#parteSinResolver").load("partesSinResolver.php");
	}, 7000);
	$("body").on('click','#btnEnviarFormFHA',function(e) {
		var opcion = $("#fechaFormFH").val();
		opcion += $("#horaFormFH").val();
		opcion += $("#salaBuscar").val();
		if (opcion==""){
			$("#warning").alert().show("slow");
			setInterval('$("#warning").alert().hide(1500)', 4500);
		}
		var val = $('#busqueda').serialize();
		$("#cuerpo").hide("slow");
		if(val != "") {
			$.ajax({
				type: "post",
				url: "consultaInforme.php",
				data: val,
				success: function(data) {
					$("#cuerpo").html(data).fadeIn(2000);
				}
			})
			return false;
		} else{
			$("#cuerpo").html("<p>No se han rellenado datos</p>");
		}
	});
	$("body").on('click','#btnEnviarFormHistorico',function(e) {
		var opcion = $("#profesorBuscar").val();
		if (opcion==""){
			$("#error").alert().show("slow");
			setInterval('$("#error").alert().hide(1500)', 2500);
			$("#cuerpo").html("");
			return false;
		}
		var val = $('#busquedaHistorico').serialize();
		$("#cuerpo").hide("slow");
		if(val != "") {
			$.ajax({
				type: "post",
				url: "consultaInforme.php",
				data: val,
				success: function(data) {
					$("#cuerpo").html(data).fadeIn(2000);
				}
			})
			return false;
		} else{
			$("#cuerpo").html("<p>No se han rellenado datos</p>");
		}
	});
	$("body").on('click','#btnEnviarFormIncidencia',function(e) {
		var opcion = $("#pcIncidencia").val();
		var opcion2 = $("#salaBuscarIncidencia").val();
		if ((opcion=="")||(opcion2=="")){
			$("#error").alert().show("slow");
			setInterval('$("#error").alert().hide(1500)', 2500);
			$("#cuerpo").html("");
			return false;
		}
		var val = $('#busquedaIncidencias').serialize();
		$("#cuerpo").hide("slow");
		if(val != "") {
			$.ajax({
				type: "post",
				url: "consultaInforme.php",
				data: val,
				success: function(data) {
					$("#cuerpo").html(data).fadeIn(2000);
				}
			})
			return false;
		} else{
			$("#cuerpo").html("<p>No se han rellenado datos</p>");
		}
	});
	$("body").on('click','#accionAdministradorSeleccionada',function(e) {
		var opcion = $("#accionAdministrador").val();
		if (opcion==""){
			$("#error").alert().show("slow");
			setInterval('$("#error").alert().hide(1500)', 2500);
		}
		else if (opcion=="1"){
			$("#opciones").hide("slow");
			$("#zonaBusqueda").show("slow");
		}
		else if (opcion=="2"){
			$("#opciones").hide("slow");
			$("#zonaHistorico").show("slow");
		}
		else if (opcion=="3"){
			$("#opciones").hide("slow");
			$("#zonaIncidencias").show("slow");
		}
		else {
			$("#opciones").hide("slow");
			var val = $(this).attr('id');
			$("#cuerpo").hide("slow");
			if(val != "") {
				$.ajax({
					type: "post",
					url: "consultaInforme.php",
					data: ({partePendiente: val}),
					success: function(data) {
						$("#cuerpo").html(data).fadeIn(2000);
					}
				})
				return false;
			} else{
				$("#cuerpo").html("<p>No se han rellenado datos</p>");
			}
		}
	});	
	$("body").on('click','.volverOpciones',function(e) {
		if ($("#zonaBusqueda").css('display')=="block"){
			$("#accionAdministrador").val("");
			$("#horaFormFH").val("");
			$("#salaBuscar").val("");
			$("#salaBuscarIncidencia").val("");
			$("#profesorBuscar").val("");
			$("#pcIncidencia").val("");
			$("#zonaBusqueda").fadeOut("slow");
			$("#cuerpo").html("").fadeOut(2000);
			$("#opciones").show("slow");
		}
		if ($("#zonaHistorico").css('display')=="block"){
			$("#accionAdministrador").val("");
			$("#horaFormFH").val("");
			$("#salaBuscar").val("");
			$("#salaBuscarIncidencia").val("");
			$("#profesorBuscar").val("");
			$("#pcIncidencia").val("");
			$("#zonaHistorico").fadeOut("slow");
			$("#cuerpo").html("").fadeOut(2000);
			$("#opciones").show("slow");
		}
		if ($("#zonaIncidencias").css('display')=="block"){
			$("#accionAdministrador").val("");
			$("#horaFormFH").val("");
			$("#salaBuscar").val("");
			$("#salaBuscarIncidencia").val("");
			$("#profesorBuscar").val("");
			$("#pcIncidencia").val("");
			$("#zonaIncidencias").fadeOut("slow");
			$("#cuerpo").html("").fadeOut(2000);
			$("#opciones").show("slow");
		}
		if ($("#cuerpo").css('display')=="block"){
			$("#accionAdministrador").val("");
			$("#horaFormFH").val("");
			$("#salaBuscar").val("");
			$("#salaBuscarIncidencia").val("");
			$("#profesorBuscar").val("");
			$("#pcIncidencia").val("");
			$("#cuerpo").html("").fadeOut(2000);
			$("#opciones").show("slow");
		}
	});
	$("body").on('click','#btnResuelto',function(e) {
		var idParteResuelto = $('#idParteResuelto').val();
		var idParteResolver = $('#idParteResolver').val();
		if ((idParteResolver != "") && (idParteResuelto != "")) {
			$.ajax({
				type: "post",
				url: "modificarParte.php",
				data: ({ParteResuelto:idParteResuelto,ParteResolver:idParteResolver}),
				success: function(data) {
					$("#cuerpo").html(data).fadeIn(2000);
				}
			})
			return false;
		} else{
			$("#cuerpo").html("<p>No se han rellenado datos</p>");
		}
	});
})