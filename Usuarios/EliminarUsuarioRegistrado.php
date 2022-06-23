<?php
include("../conexion/conexion.php");

$id_usuario=$_REQUEST['id_usuario'];

mysqli_query($con,"DELETE FROM usuarios WHERE id_usuario='$id_usuario'")or die (mysqli_error());	

echo '<script language = javascript>
alert("la Informacion ha sido borrada Correctamente")
self.location = "UsuariosRegistrados.php"
</script>';
