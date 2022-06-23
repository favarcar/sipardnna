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


$id_expediente=(int)$_POST['id_expediente'];
$fecha_actuacion =$_POST['fecha_actuacion'];
$funcionario_actuacion =$_POST['funcionario_actuacion'];
$descripcion_actuacion=$_POST['descripcion_actuacion'];
$compromisos =$_POST['compromisos'];


$consulta= "INSERT INTO `actuacion`( `id_expediente`, `fecha_actuacion`,`funcionario_actuacion`, `descripcion_actuacion`, `compromisos`) VALUES ('$id_expediente','$fecha_actuacion','$funcionario_actuacion','$descripcion_actuacion','$compromisos')"; 
if(mysqli_query($con,$consulta)){
	echo $id_expe;
}else{
	echo "err";
}
?>