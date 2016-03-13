<?php
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	session_unset();
	session_destroy();
	echo '<script type="text/javascript">
		alert("Se está cerrando su sesión.\nSerá redirigido inmediatamente a la página de inicio.");
		setInterval("location.href=\'index.php\';", 1000);
	</script>';
?>