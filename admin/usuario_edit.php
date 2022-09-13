<?php
$tabla="usuarios";
$id="id_usuario";
$keydes = 56;
$cod_uso = $_GET['Id'];
//Consulta para listar los campos y sus propiedades para construir el formulario
$field_tit = mysqli_query($con,"DESCRIBE $tabla");
$r_fieldi_tit = mysqli_fetch_assoc($field_tit);

//print_r($rusosql);

//Consulta para mostar los valores de los campos
$sql = mysqli_query($con, "SELECT * FROM $tabla ORDER BY $id = '$cod_uso' DESC")or die(mysqli_error($con));
$row_sql = mysqli_fetch_assoc($sql);

//lisado de genero 
$genero  = mysqli_query($con, "SELECT * FROM generos")or die(mysqli_error($con));
$row_gen = mysqli_fetch_assoc($genero);

//lisado de documentos 
$documento  = mysqli_query($con, "SELECT * FROM tipos_documentos")or die(mysqli_error($con));
$row_doc = mysqli_fetch_assoc($documento);

//listado de municipio
$municipio  = mysqli_query($con, "SELECT * FROM municipios")or die(mysqli_error($con));
$row_mun = mysqli_fetch_assoc($municipio);

//password
$clave  = mysqli_query($con, "SELECT * FROM usuarios")or die(mysqli_error($con));
$row_cla = mysqli_fetch_assoc($clave);  

//listado de perfil
$perfil  = mysqli_query($con, "SELECT * FROM perfiles")or die(mysqli_error($con));
$row_per = mysqli_fetch_assoc($perfil);

//listado de entidades
$nivel  = mysqli_query($con, "SELECT * FROM usuarios")or die(mysqli_error($con));
$row_niv = mysqli_fetch_assoc($nivel);

//listado de entidades
$entidad  = mysqli_query($con, "SELECT * FROM entidades")or die(mysqli_error($con));
$row_ent = mysqli_fetch_assoc($entidad);

//fecha
$fecha  = mysqli_query($con, "SELECT * FROM usuarios")or die(mysqli_error($con));
$row_fecha = mysqli_fetch_assoc($fecha);
	 
?>

                    <div class="box-header with-border">
                      <h3 class="box-title">Editar usuario</h3>
                      <a href="main.php?key=54" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Regresar</a>
                      <div class="box-tools pull-right">
                      </div>
                    </div>
<div class="box-body">
  <form action="main.php?key=<?= $keydes ?>&Id=<?php echo $cod_uso; ?>" method="post" enctype="multipart/form-data" >
<br>

    <?php do{?>
   <div style="display:<?php if ($r_fieldi_tit['Key'] == "PRI"){ echo "none"; } else { echo "inline"; } ?>">

  		<strong><?php echo mask_field($r_fieldi_tit['Field']) ?></strong></div>
    <?php

//No muestre la id
  if($r_fieldi_tit['Key'] == "PRI"){
  		continue;

        //Si es el usuario, todos los datos

 /* }else if($r_fieldi_tit['Field'] == "id_tipo_documento"){
        //Se traen el dato de la tabla usuario y de tipo de documento
        echo '<select name="'.$r_fieldi_tit['Field'].'" class="form-control js-example-basic-single">';
        echo '<option value="'.$row_gen[$r_fieldi_tit['Field']].'" selected> '.$row_sql[$r_fieldi_tit['Field']].' </option>';
          do {
         echo '<option value="'.$row_doc['id_tipo_documento'].'">'.$row_doc['descripcion'].'</option>';
       } while ($row_doc = mysqli_fetch_assoc($documento));
        echo '</select>';*/
      

/*}else if($r_fieldi_tit['Field'] == "id_genero"){
  //Se traen el dato de la tabla usuario y de genero
echo '<select name="'.$r_fieldi_tit['Field'].'" class="form-control js-example-basic-single">';
echo '<option value="'.$row_gen[$r_fieldi_tit['Field']].'" selected> '.$row_sql[$r_fieldi_tit['Field']].' </option>';
do {
  echo '<option value="'.$row_gen['id_genero'].'">'.$row_gen['descripcion'].'</option>';
} while ($row_gen = mysqli_fetch_assoc($genero));
 echo '</select>';*/


	//Si es el registro, cargue el listado de municipios
}else if($r_fieldi_tit['Field'] == "id_municipio"){
		//Se construye select campo
    echo '<select name="'.$r_fieldi_tit['Field'].'" class="form-control js-example-basic-single">';
    echo '<option value="'.$row_mun[$r_fieldi_tit['Field']].'" selected> '.$row_sql[$r_fieldi_tit['Field']].' </option>';
			do {
		 echo '<option value="'.$row_mun['id_municipio'].'">'.$row_mun['descripcion'].'</option>';
	 } while ($row_mun = mysqli_fetch_assoc($municipio));
		echo '</select>';
	}

  
	//Encriptar la clave y verificación de esta

	else if($r_fieldi_tit['Field'] == "clave"){
		//Se construye select campo

		echo '<input id="textinput" name="clave" type="password" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $clave ?>">'; 
    do {
      
    } while ($row_cla = mysqli_fetch_assoc($clave));
     
    echo '<label>Repita '.mask_field($r_fieldi_tit['Field']).'</label>';
		echo '<input id="textinput" name="clave2" type="password" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $clave ?>">'; 
    do {
    } while ($row_cla = mysqli_fetch_assoc($clave));

  }

	


	//Si es el registro, cargue el listado de perfil
	else if($r_fieldi_tit['Field'] == "id_perfil"){
		//Se construye select campo
    echo '<select name="'.$r_fieldi_tit['Field'].'" class="form-control js-example-basic-single">';
    echo '<option value="'.$row_per[$r_fieldi_tit['Field']].'" selected> '.$row_sql[$r_fieldi_tit['Field']].' </option>';
			do {
		 echo '<option value="'.$row_per['id_perfil'].'">'.$row_per['descripcion'].'</option>';
	 } while ($row_per = mysqli_fetch_assoc($perfil));
		echo '</select>';

	}




  	//Si es el registro, cargue el listado de entidad
	else if($r_fieldi_tit['Field'] == "id_entidad"){
		//Se construye select campo
    echo '<select name="'.$r_fieldi_tit['Field'].'" class="form-control js-example-basic-single">';
    echo '<option value="'.$row_ent[$r_fieldi_tit['Field']].'" selected> '.$row_sql[$r_fieldi_tit['Field']].' </option>';
			do {
		 echo '<option value="'.$row_ent['id_entidad'].'">'.$row_ent['descripcion_entidades'].'</option>';
	 } while ($row_ent = mysqli_fetch_assoc($entidad));
		echo '</select>';

	

     }else{


     echo define_input($r_fieldi_tit['Type'], $r_fieldi_tit['Field'], $row_sql[$r_fieldi_tit['Field']], $r_fieldi_tit['Null'] );
      }
      ?>

     <?php } while ($r_fieldi_tit = mysqli_fetch_assoc($field_tit)); ?>

     <br>
  <p align="center"><input  class="btn btn-warning pull-left" type="submit" id="nuevo" value="Editar">
  </form>
      <!-- Configuracion para que el pie de pagina no quede tan arriba-->
      <div class="container" style="padding-top: 5%;"></div>

</div>
</div>
