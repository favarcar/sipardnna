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
$id_exp= $_POST['id_exp'];


$consulta= "SELECT * FROM indicadores_expedientes ie
INNER JOIN indicadores ind ON ind.id_indicador = ie.id_indicador
where ie.id_exp='$id_exp'"; 
$resultado= mysqli_query($con,$consulta) or die (mysqli_error($con));
$rows = array();
while($row = $resultado->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);


?>