<?php
include("../conexion/conexion.php");

	$id_ninos=$_GET['id_ninos'];

	$con1=mysqli_query($con,"DELETE FROM cuidadores WHERE id_ninos='$id_ninos'")or die (mysqli_error());

	
	echo '<script language = javascript>
alert("la Informacion ha sido borrada Correctamente")
self.location = "ConsultarMPC1.php"
</script>';

?>