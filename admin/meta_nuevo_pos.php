  <?php



//Codigo para automatizar el Update de registros
$a = array();

//Se incia el blucle para formar la cadena del UPDATE
foreach ($_POST as $campo => $valor) {

 $a[] = $campo;
 $b[] = "'".$valor."'";

switch ($campo){

  case "Codigo":

  if(!(consulta_campo("pdm_oficial","Codigo_Indicador_Producto",$valor,"Id")) ){
  exit('<div class="alert alert-warning">Este código no existe en el plan de desarrollo <button class="btn btn-success" onclick="javascript: history.go(-1)"><i class="fa fa-arrow-left"></i>Regresar</button></div>');
  }

  if(consulta_campo("usuarios","Codigo",$valor,"id_usuario") ){
    exit('El codigo ya esta asociado a una meta <button onclick="javascript:history.go(-1)"><i class="fa fa-arrow-left"></i>Regresar</button>');
  }

  break;
}

 //Se va almacenando en el arreglo, el update por variable
}
    $campos = implode(",", $a);
	$valorsupdate = implode(",", $b);

mysqli_query($con,"INSERT usuarios ($campos) VALUES ($valorsupdate)") or die(mysqli_error($con));
	$Id = mysqli_insert_id($con);
echo '<div class="alert alert-success">El registro se ha creado <a href="main.php?key=7" class="btn btn-success"><i class="fa fa-arrow-left"></i>Regresar</a></div>';

  ?>
        <!-- Configuracion para que el pie de pagina no quede tan arriba-->
        <div class="container" style="padding-top: 55%;"></div>
