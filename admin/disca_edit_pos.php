<title>Dicapacidad - Editar</title>

<?php

$tabla="discapacidades";
$id="id_discapacidad";
$keydes = 68;
$cod_uso = $_GET['Id'];
// Se listan todos los campos de la tabla
$usosql = mysqli_query($con,"DESCRIBE $tabla");
$rusosql = mysqli_fetch_assoc($usosql);

//Se realiza consulta para identificar registro en Sipardnna
     $uso = mysqli_query($con,"SELECT * FROM $tabla WHERE $id = '$cod_uso'")or die(mysqli_error($con));
	 $row_uso = mysqli_fetch_assoc($uso);
      $total_uso = mysqli_num_rows($uso);?>
</head>

<body>
<h2>Editar Discapacidad</h2>


  <?php


//Codigo para automatizar el Update de registros
$a = array();
//Se incia el blucle para formar la cadena del UPDATE
foreach ($_POST as $campo => $valor) {
 $a[] = $campo." = '".$valor."'";
 //Se va almacenando en el arreglo, el update por variable
}
      $valorsupdate = implode(", ", $a);
//echo "UPDATE usosdesuelo SET $valorsupdate, Grupo = '$grupo', Impacto = '$impacto', Uso = '{$row_sect['Uso']}'  WHERE Id_uso = '$cod_uso'";

mysqli_query($con,"UPDATE $tabla SET $valorsupdate WHERE $id = '$cod_uso'")or die(mysqli_error($con));

echo '<div class="alert alert-success">El registro se ha actualizado <a href="main.php?key='.$keydes.'&Id='.$cod_uso.'" class="btn btn-success"><i class="fa fa-arrow-left"></i>Regresar</a></div>';
  ?>
      <!-- Configuracion para que el pie de pagina no quede tan arriba-->
      <div class="container" style="padding-top: 50%;"></div>

</body>
</html>

