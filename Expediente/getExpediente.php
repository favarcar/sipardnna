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
$idNna= $_POST['id_ninnos'];


$consulta= "SELECT * FROM expediente exp 
INNER JOIN discapacidades dis ON dis.id_discapacidad = exp.id_discapacidad
INNER JOIN maltratos mal ON mal.id_maltrato = exp.id_maltrato
INNER JOIN victimas vic ON vic.id_victima = exp.id_victima
INNER JOIN derechos dere ON dere.id_derecho = exp.id_derecho
INNER JOIN entidades enti ON enti.id_entidad = exp.id_entidad
INNER JOIN estado_caso ecu ON ecu.id_estadocaso = exp.id_estadocaso
where exp.id_ninnos='$idNna'"; 
$resultado= mysqli_query($con,$consulta) or die (mysqli_error());
$rows = array();
while($row = $resultado->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);


?>