<?php
include("../conexion/conexion.php");

	echo $id_ninnos=$_GET['id_ninnos'];

	$con1=mysqli_query($con,"DELETE FROM ninnosnna WHERE id_ninnos='$id_ninnos'")or die (mysqli_error());

	
	echo '<script language = javascript>
alert("la Informacion ha sido borrada Correctamente")
self.location = "ConsultarNNA.php"
</script>';

?>