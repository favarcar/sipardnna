<?php
	echo $codigo_expediente=$_GET['codigo_expediente'];

	$con1=mysqli_query($con,"DELETE FROM expediente WHERE codigo_expediente='$codigo_expediente'")or die (mysqli_error($con));

	
	echo '<script language = javascript>
alert("la Informacion ha sido borrada Correctamente")
self.location = "main.php?key=51"
</script>';

?>