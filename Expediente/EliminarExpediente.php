<?php
include("../conexion/conexion.php");

	echo $codigo_expediente=$_GET['codigo_expediente'];

	$con1=mysqli_query($con,"DELETE FROM expediente WHERE codigo_expediente='$codigo_expediente'")or die (mysqli_error());
	
	$con2=mysqli_query($con,"DELETE FROM remite WHERE codigo_expediente='$codigo_expediente'")or die (mysqli_error());

	
	echo '<script language = javascript>
alert("la Informacion ha sido borrada Correctamente")
self.location = "ConsultarExpediente.php"
</script>';

?>