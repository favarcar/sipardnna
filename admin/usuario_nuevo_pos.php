<?php
$tabla="usuarios";
$keydes=54;

	
	
//Codigo para automatizar el Update de registros   	 
$a = array();	 

//Se incia el blucle para formar la cadena del UPDATE
foreach ($_POST as $campo => $valor) {
	
 
 switch ($campo){
    case "clave":
    continue;
    break;
    case "clave2":
    continue;
    break;
  }

  $a[] = $campo;
  $b[] = "'".$valor."'";	
  //Se va almacenando en el arreglo, el update por variable
}  

$pass1 = md5($_POST['clave']);
$pass2 = md5($_POST['clave2']);

if($pass1 != $pass2){
    exit('<div class="alert alert-warning">No coiciden las contraseñas<button class="btn btn-success" onclick="javascript: history.go(-1)"><i class="fa fa-arrow-left"></i>Regresar</button></div>');
}



    $campos = implode(",", $a);
	$valorsupdate = implode(",", $b);
	
mysqli_query($con,"INSERT $tabla ($campos, clave) VALUES ($valorsupdate,'$pass1')") or die(mysqli_error($con));
	$Id = mysqli_insert_id($con);
echo '<div class="alert alert-success">El registro se ha creado <a href="main.php?key='.$keydes.'" class="btn btn-success"><i class="fa fa-arrow-left"></i>Regresar</a></div>';
	
  ?>
      <!-- Configuracion para que el pie de pagina no quede tan arriba-->
  <div class="container" style="padding-top: 55%;"></div>
