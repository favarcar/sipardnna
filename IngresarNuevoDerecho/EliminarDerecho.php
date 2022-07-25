
<?php
	echo $id_derecho=$_GET['id_derecho'];

	$con1=mysqli_query($con,"DELETE FROM derechos WHERE id_derecho='$id_derecho'")or die (mysqli_error($con));

	
	echo '<script language = javascript>
alert("la Informacion ha sido borrada Correctamente")
self.location = "main.php?key=20"
</script>';

?>