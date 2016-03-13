function compruebaCheck(){
	var check=document.getElementById("idParteResuelto");
	if (check.value=="Si"){
		check.checked=true;
	}
	else{
		check.checked=false;
	}
}
function cambiaCheck(elemento){
	if (elemento.value=="No"){
		elemento.value="Si";
	}
	else{
		elemento.value="No";
	}
}