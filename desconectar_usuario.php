<meta charset="utf-8"/>
<?php 
session_start();

if ($_SESSION['nombres']){
    echo '<script language = javascript>
        alert("No ha iniciado ninguna sesión, por favor regístrese")
	self.location = "index.html"
	</script>';
}
else{
    session_destroy();
    echo '<script language = javascript>
	alert("su sesion ha terminado correctamente")
	self.location = "index.html"
	</script>';
}
?>