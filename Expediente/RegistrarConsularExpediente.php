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


$consulta= "SELECT *, pais.Nombre nompais, mun.descripcion nomdes FROM ninnosnna nna 
inner join municipios mun on mun.id_municipio = nna.id_municipio_hechos 
inner join provincias prov on prov.id_provincia = nna.id_provincia 
inner join paises pais on pais.Id_Pais = nna.id_pais 
inner join departamentos dep on dep.id = nna.id_departamento
where id_usuario='$id_usuario' order by id_ninnos  desc"; 
$resultado= mysqli_query($con,$consulta) or die (mysqli_error($con));
$rows = array();
while($row = $resultado->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);
?>