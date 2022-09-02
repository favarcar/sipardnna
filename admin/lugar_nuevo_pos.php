<?php
$tabla="lugar_hechos";
$keydes=85;

	
	
//Codigo para automatizar el Update de registros   	 
$a = array();	 

//Se incia el blucle para formar la cadena del UPDATE
foreach ($_POST as $campo => $valor) {
	
 $a[] = $campo;
 $b[] = "'".$valor."'";	
 //Se va almacenando en el arreglo, el update por variable
}  
    $campos = implode(",", $a);
	$valorsupdate = implode(",", $b);
	
mysqli_query($con,"INSERT $tabla ($campos) VALUES ($valorsupdate)") or die(mysqli_error($con));
	$Id = mysqli_insert_id($con);
echo '<div class="alert alert-success">El registro se ha creado <a href="main.php?key='.$keydes.'" class="btn btn-success"><i class="fa fa-arrow-left"></i>Regresar</a></div>';
	
  ?>