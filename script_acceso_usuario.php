<?php
//Proceso de conexi�n con la base de datos
include("conexion/conexion.php");

//Inicio de variables de sesi�n
if (!isset($_SESSION)) { 
  session_start();
}

//Recibir los datos ingresados en el formulario
$usuario        = $_POST['usuario'];
$contrasena     = $_POST['contrasena'];
$contrasena_md5 = md5($contrasena);
//echo $usuario.'-'.$contrasena_md5;

/////////////////Consulta para el ingreso a administrativos

//Consultar si los datos son est�n guardados en la base de datos
$consulta= "SELECT * FROM usuarios WHERE usuario = '".$usuario."' AND clave = '".$contrasena_md5."' AND estado = 1";
$resultado = mysqli_query ($con,$consulta) or die (mysqli_error($con));
$fila = mysqli_fetch_array($resultado);

if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique.")
	self.location = "index.html"
	</script>';
}
else //opcion2: Usuario logueado correctamente
{
	//Definimos las variables de sesi�n y redirigimos a la p�gina de usuario
	$_SESSION['nombres'] = $fila['nombres'];
	$_SESSION['numero_documento'] = $fila['numero_documento'];

	$con1= "SELECT * FROM usuarios WHERE usuario = '".$usuario."' AND clave='".$contrasena_md5."' AND estado = 1";
	$resultado1 = mysqli_query ($con,$con1) or die (mysqli_error($con));

header("Location: main.php?key=0");

	 while($row=mysqli_fetch_array($resultado1)){
	 $consecutivo= $row['consecutivo'];
	  $id_usuario= $row['id_usuario'];
	  $id_perfil= $row['id_perfil'];
	  $nuser=$row['Nivel'];
	 }
	date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha=  date("Y-m-d", $time);
	$hora=  date("H:m:n", $time);

	 mysqli_query($con,"INSERT INTO `logins` VALUES ('$consecutivo','$id_usuario','$fecha','$hora')") or die(mysql_error());

  }



?>
