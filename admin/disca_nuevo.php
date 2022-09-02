
<?php
$tabla="discapacidades";
$id="id_discapacidad";

//Consulta para listar los campos y sus propiedades para construir el formulario
$field_tit = mysqli_query($con,"DESCRIBE $tabla");
$r_fieldi_tit = mysqli_fetch_assoc($field_tit);

$sql = mysqli_query($con, "SELECT * FROM $tabla ORDER BY $id DESC")or die(mysqli_error($con));
	 $row_sql = mysqli_fetch_assoc($sql);
//Se listan todas las columnas de la consulta
$columnas = mysqli_fetch_fields($sql);

//lisado de documentos 
$documento  = mysqli_query($con, "SELECT * FROM tipos_documentos")or die(mysqli_error($con));
$row_doc = mysqli_fetch_assoc($documento);


  ?>


<div  id="form_add" class="collapse">
<br>	
<center><h3 >Ingresar nueva discapacidad</h3></center>
<form action="main.php?key=63" method="post" enctype="multipart/form-data" name="nuevo_reg" target="_self" id="nuevo_reg">
  <?php do{?>
  <?php
//Si es la actividad, cargue el listado tipo de documentos
if($r_fieldi_tit['Field'] == "id_tipo_documento"){
	//Se construye select plan
	echo '<label>'.mask_field($r_fieldi_tit['Field']).'</label>
	<select name="'.$r_fieldi_tit['Field'].'" class="form-control" required="required" >
	 <option value="" selected="selected" >Seleccionar...</option>';
		do {
	 echo '<option value="'.$row_doc['id_tipo_documento'].'">'.$row_doc['descripcion'].'</option>';
 } while ($row_doc = mysqli_fetch_assoc($documento));
	echo '</select>';
}

	//Si es la actividad, cargue el listado de generos
	else if($r_fieldi_tit['Field'] == "id_genero"){
		//Se construye select plan
		echo '<label>'.mask_field($r_fieldi_tit['Field']).'</label>
		<select name="'.$r_fieldi_tit['Field'].'" class="form-control" required="required" >
		 <option value="" selected="selected" >Seleccionar...</option>';
			do {
		 echo '<option value="'.$row_gen['id_genero'].'">'.$row_gen['descripcion'].'</option>';
	 } while ($row_gen = mysqli_fetch_assoc($genero));
		echo '</select>';
	}

	//Si es la actividad, cargue el listado de municipios
	else if($r_fieldi_tit['Field'] == "id_municipio"){
		//Se construye select plan
		echo '<label>'.mask_field($r_fieldi_tit['Field']).'</label>
		<select name="'.$r_fieldi_tit['Field'].'" class="form-control" required="required" >
		 <option value="" selected="selected" >Seleccionar...</option>';
			do {
		 echo '<option value="'.$row_mun['id_municipio'].'">'.$row_mun['descripcion'].'</option>';
	 } while ($row_mun = mysqli_fetch_assoc($municipio));
		echo '</select>';
	}
	//Si es la actividad, cargue el listado de municipios
	else if($r_fieldi_tit['Field'] == "clave"){
		//Se construye select plan
		echo '<label>'.mask_field($r_fieldi_tit['Field']).'</label>';
		echo '<input type="password" placeholder="" class="form-control input-md" required>';

	}
	//Si es la actividad, cargue el listado de perfil
	else if($r_fieldi_tit['Field'] == "id_perfil"){
		//Se construye select plan
		echo '<label>'.mask_field($r_fieldi_tit['Field']).'</label>
		<select name="'.$r_fieldi_tit['Field'].'" class="form-control" required="required" >
		 <option value="" selected="selected" >Seleccionar...</option>';
			do {
		 echo '<option value="'.$row_per['id_perfil'].'">'.$row_per['descripcion'].'</option>';
	 } while ($row_per = mysqli_fetch_assoc($perfil));
		echo '</select>';

	}
	//Si es la actividad, cargue el listado de entidad
	else if($r_fieldi_tit['Field'] == "id_entidad"){
		//Se construye select plan
		echo '<label>'.mask_field($r_fieldi_tit['Field']).'</label>
		<select name="'.$r_fieldi_tit['Field'].'" class="form-control" required="required" >
		 <option value="" selected="selected" >Seleccionar...</option>';
			do {
		 echo '<option value="'.$row_ent['id_entidad'].'">'.$row_ent['descripcion_entidades'].'</option>';
	 } while ($row_ent = mysqli_fetch_assoc($entidad));
		echo '</select>';
		
}elseif($r_fieldi_tit['Key'] == "PRI"){
   continue;
}else{
echo '<label>'.mask_field($r_fieldi_tit['Field']).'</label>';
   echo define_input($r_fieldi_tit['Type'], $r_fieldi_tit['Field'], "",$r_fieldi_tit['Null'] );
    }
    ?>

   <?php } while ($r_fieldi_tit = mysqli_fetch_assoc($field_tit)); ?>
<br>
<button  class="btn btn-success pull-left" type="submit" id="nuevo"><span class="glyphicon glyphicon-edit"></span> Registrar</button><br>
</form>
</div><br>
<button data-toggle="collapse" data-target="#form_add" class="btn btn-primary"><i class="fa fa-plus"></i>Agregar</button><br>
<!-- Comienza la tabla del listado -->
<br>



<div class="table-responsive">

  <table id="datatable-buttons"  class="table table-striped table-bordered" align="center" border="1" style="width:auto; height:20px;" >
      <thead>
	<tr>
	  <td colspan="10" class="letra n600 azulo" bgcolor="#ff9933">Usuarios Registrados:
	  <!--Traer el numero de usuarios registrados en la tabla usuarios -->
	  <?php
                                                $con4 = mysqli_query($con, "SELECT count(id_usuario) FROM usuarios");
                                                while ($row4 = mysqli_fetch_array($con4)) {
                                                    echo $nom_asignatura11 = $row4['count(id_usuario)'];
                                                } ?>
												
    </td></tr>
		
    <tr>

	  
      <th style="width: 500px;">Consultar, editar o eliminar</th>
      <?php
	//se crea el encabezado
	foreach ($columnas as $valor){
		if($valor->name == $id ){continue;}
		echo '<th style="display:'.colvisible($valor->name).'"><strong>'.mask_field($valor->name).'</strong></th>';
	}
	?>
      </tr>
    </thead>
    <tbody>
	<?php
	do { ?>
    <tr>
     <td  align="center">
		 <span>
			<!--botones agrupados-->
<div id="botones_com" style="display:<?php echo  $visiblevisit ?>; style="float: left;">
   <!--boton ver-->
  <a href="main.php?key=68&Id=<?= $row_sql[$id] ?>"  class="btn btn-primary btn-sm" style="display:<?=$visible;?>"><span class="glyphicon glyphicon-search"></span></a>
	<!--boton editar-->
<a href="main.php?key=61&Id=<?php echo $row_sql['id_discapacidad']; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>	
<!--boton eliminar-->
	<a href="javascript:borrado(<?php echo $row_sql[$id];?>,'<?= $tabla ?>','<?= $id ?>',<?php echo $verdato; ?>)"class="btn btn-danger btn-sm" style="display:<?=$visible;?>"><i class="fa fa-trash"> </i></a>
	</div>
</div>

	      </td>
     <?php
		//Contenido
		foreach ($columnas as $valor){
			if($valor->name == $id){continue;}
			echo  '<td style="display:'.colvisible($valor->name).'">'.mask_val($row_sql[$valor->name],$valor->name).'</td>';
	}
		?>
      </tr>
    <?php } while ($row_sql = mysqli_fetch_assoc($sql))?>
    </tbody>
  </table>
