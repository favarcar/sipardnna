<?php
//Proceso de conexión con la base de datos
include("../conexion/conexion.php");
	    

//Iniciar Sesión
session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.html"
</script>';
}
$id_usuario = $_SESSION['numero_documento'];


$id_indicador=$_POST['id_indicador'];
$id_expe =(int)$_POST['id_exp'];


$consulta= "INSERT INTO `indicadores_expedientes`(`id_indicador`, `id_exp`) VALUES ('$id_indicador','$id_expe')"; 
if(mysqli_query($con,$consulta)){
	echo $id_expe;
}else{
	echo "err";
}
?>