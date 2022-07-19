<?php
//Proceso de conexión con la base de datos
include("../conexion/conexion.php");
include("../funshow.php");
	    

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

if(consulta_campo('cuidadores','id_ninos', $id_ninnos,'id_cuidadores'))
$cuidadores = "inner join cuidadores cud on cud.id_ninos = nna.id_ninnos";
else{
    $cuidadores="";  
}
$consulta= "SELECT * FROM ninnosnna nna 
".$cuidadores."
inner join municipios mun on mun.id_municipio = nna.id_municipio_hechos 
inner join provincias prov on prov.id_provincia = nna.id_provincia 
where id_ninnos='$id_ninnos'"; 

$resultado= mysqli_query($con,$consulta) or die (mysqli_error($con));
$rows = array();
while($row = $resultado->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);


?>