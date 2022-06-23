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
date_default_timezone_set('America/Bogota');
$time = time();
$fecha=  date("Y-m-d", $time);


$NUMERO_PROCESO=$_POST['NUMERO_PROCESO'];
$fecha_exp=$_POST['fecha_exp'];
$id_ninnos=$_POST['id_ninnos'];
$cuidadores_exp=$_POST['cuidadores_exp'];
$discapacidad_exp=$_POST['discapacidad_exp'];

$maltratos_exp=$_POST['maltratos_exp'];
$victima_exp=$_POST['victima_exp'];
$descripcion_exp= str_replace("\r\n", "</br>", $_POST['descripcion_exp']);
$derechos_exp=$_POST['derechos_exp'];
$obs_exp=$_POST['obs_exp'];
$veredicto_exp=$_POST['veredicto_exp'];
$finalizacion_exp=$_POST['finalizacion_exp'];
$entidad_exp=$_POST['entidad_exp'];
$id_usuario_exp= $id_usuario; 
$estadocaso_exp=$_POST['estadocaso_exp']; 

$fecha_limite1 = date('Y-m-j');
$nuevafecha = strtotime ( '+180 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
$fecha_limite=$nuevafecha;

$consulta= "INSERT INTO `expediente`(`NUMERO_PROCESO`, `Fecha_inicio_expediente`, `id_ninnos`, `id_cuidadores`, `id_discapacidad`, `id_indicador`, `id_maltrato`, `id_victima`, `Descripcion_expediente`, `id_derecho`, `Observacion`, `Veredicto_Caso`, `Fecha_finalizacion_expediente`, `id_entidad`, `id_usuario_exp`, `id_estadocaso`, `fecha_limite`) VALUES ('$NUMERO_PROCESO','$fecha_exp','$id_ninnos','$cuidadores_exp','$discapacidad_exp',0,'$maltratos_exp','$victima_exp','$descripcion_exp','$derechos_exp','$obs_exp','$veredicto_exp','$finalizacion_exp','$entidad_exp','$id_usuario_exp','$estadocaso_exp','$fecha_limite')"; 
if(mysqli_query($con,$consulta)){
	echo mysqli_insert_id($con);
}else{
	echo "err";
}

mysqli_close($con);
?>