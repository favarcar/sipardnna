
<?php 
//include('../con.php');

$id_dato = $_GET['Id_dato'];
$tabla = $_GET['Tabla'];
$clave = $_GET['Clave'];
$backey = $_GET['Anterior'];
$live = $_GET['Live'];



mysqli_query($con,"DELETE FROM $tabla WHERE $clave = '$id_dato'") or  die(mysqli_error($con));


echo '<div class="alert alert-success"><h>El Registro se ha eliminado</h>';
echo '
<a href="main.php?key='.$backey.'" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i>Regresar</a></div>';
?>