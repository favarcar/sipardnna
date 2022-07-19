<?php
include("../conexion/conexion.php");
    
    echo $id_ninnos=$_GET['id_ninnos'];

	$con1=mysqli_query($con,"DELETE FROM cuidadores WHERE id_ninos='$id_ninnos'")or die (mysqli_error($con));

	
	echo '<script language = javascript>
alert("la Información ha sido borrada Correctamente")
self.location = "ConsultarMPC.php"
</script>';

?>