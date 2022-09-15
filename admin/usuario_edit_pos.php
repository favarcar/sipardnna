<title>Editar - Usuario</title>

<?php

$tabla="usuarios";
$id="id_usuario";
$keydes = 58;
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
<h2>Editar usuario</h2>


  <?php

print_r($_POST);
//Codigo para automatizar el Update de registros
$a = array();
//Se incia el blucle para formar la cadena del UPDATE
foreach ($_POST as $campo => $valor) {

      
       //Si alguno de estos campos no existe continue
            if ($campo == "clave" || $campo == "clave2" || $campo == "check"){
                  continue;
             

             
             


      }
      
      
       

 $a[] = $campo." = '".$valor."'";
 //Se va almacenando en el arreglo, el update por variable
}


if($_POST['check']){

      $pass1 = md5($_POST['clave']);             
             $pass2 = md5($_POST['clave2']);

             $valorq = ", clave='$pass1'";
            
   if($pass1 != $pass2){
    exit('<div class="alert alert-warning">No coiciden las contraseñas<button class="btn btn-success" onclick="javascript: history.go(-1)"><i class="fa fa-arrow-left"></i>Regresar</button></div>');
              }

      }else{
            $valorq ="";
      }




      $valorsupdate = implode(", ", $a);
echo $valorsupdate;

mysqli_query($con,"UPDATE $tabla SET $valorsupdate $valorq  WHERE $id = '$cod_uso'")or die(mysqli_error($con));

echo '<div class="alert alert-success">El registro se ha actualizado <a href="main.php?key='.$keydes.'&Id='.$cod_uso.'" class="btn btn-success"><i class="fa fa-arrow-left"></i>Regresar</a></div>';
  ?>
      <!-- Configuracion para que el pie de pagina-->
      <div class="container" style="padding-top: 50%;"></div>

</body>
</html>
