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
$id_municipio= $_POST['idMunicipio'];


$consulta= "SELECT * FROM municipios where id_municipio='$id_municipio'"; 
$resultado= mysqli_query($con,$consulta) or die (mysqli_error());
$rows = array();
while($row = $resultado->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);


?>