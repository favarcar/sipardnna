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
$id_ninnos= $_POST['id_ninoa'];


$consulta= "SELECT  exp.codigo_expediente as codigo,COUNT(*) as CONTADOR FROM expediente exp 
			where exp.id_ninnos='$id_ninnos'"; 
$resultado= mysqli_query($con,$consulta) or die (mysqli_error());
$rows = array();
while($row = $resultado->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);


?>