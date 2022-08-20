
<?php 

$id_ninnos=$_GET['id_ninnos'];

$busquedanna=mysqli_query($con,"SELECT * FROM ninnosnna where id_ninnos='$id_ninnos' ");
while($row1=mysqli_fetch_array($busquedanna)){

  $id_ninnos31=$row1['id_ninnos'];		

}
$id_cuidadores=$_GET['id_cuidadores'];

$busquedacui=mysqli_query($con,"SELECT * FROM cuidadores where id_cuidadores='$id_cuidadores' ");
while($row1=mysqli_fetch_array($busquedacui)){

  $id_cuidadores31=$row1['id_cuidadores'];		

}
$id_cuidadores31=mysqli_insert_id($con);
$id_ninnos31=mysqli_insert_id($con);
$sqlCui="INSERT INTO `cuida`(`id_cuidadores`,`id_ninnos`) VALUES ('$id_cuidadores31','$id_ninnos31')";



echo '<script language = javascript>
alert("Se asigno correctamente el cuidador")
self.location = "main.php?key=1"
</script>';
mysqli_close($con);

?>