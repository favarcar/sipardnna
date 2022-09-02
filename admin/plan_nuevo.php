<?php
//Consulta para listar los campos y sus propiedades para construir el formulario
$tabla = "planes";
$id="Id_plan";
$field_tit = mysqli_query($cone,"DESCRIBE $tabla");
$r_fieldi_tit = mysqli_fetch_assoc($field_tit);

$sql = mysqli_query($cone, "SELECT * FROM $tabla ORDER BY Id_plan DESC")or die(mysqli_error($cone));
	 $row_sql = mysqli_fetch_assoc($sql);
//Se listan todas las columnas de la consulta
$columnas = mysqli_fetch_fields($sql);
	  ?>

<form action="main.php?key=61" method="post" enctype="multipart/form-data" name="nuevo_reg" target="_self" id="nuevo_reg">


  <?php do{?>
  <?php
//Si es la actividad, cargue el listado de actividades
if($r_fieldi_tit['Key'] == "PRI"){
		continue;
}elseif ($r_fieldi_tit['Field'] == "Activo"){
				continue;
}else{
echo '<label>'.mask_field($r_fieldi_tit['Field']).'</label>';
   echo define_input($r_fieldi_tit['Type'], $r_fieldi_tit['Field'], "",$r_fieldi_tit['Null'] );
    }
    ?>

   <?php } while ($r_fieldi_tit = mysqli_fetch_assoc($field_tit)); ?>
<br>
<input  class="btn btn-warning pull-left mt-2" type="submit" id="nuevo" value="Nuevo">
</form>

<!-- Comienza la tabla del listado de contratos -->


<div class="table-responsive <?php echo $visible_casos ?>">
  <table id="datatable-buttons"  class="table table-striped table-bordered">
    <thead>
    <tr class="headings">
      <th>
        <input type="checkbox" name="marcarTodo" id="marcarTodo" />

      </th>
      <th style="width: 200px;" >Acciones de plataforma</th>
      <?php
	//se crea el encabezado
	foreach ($columnas as $valor){
		if($valor->name == "Notas" || $valor->name == "$id" ){continue;}
		echo '<th style="display:'.colvisible($valor->name).'"><strong>'.mask_field($valor->name).'</strong></th>';
	}
	?>
      </tr>
    </thead>
    <tbody>
	<?php
	do { ?>
    <tr>
     <td>


<input name="Identifica[]" class="selimprimir" type="checkbox" value="<?php echo $row_sql[$id]; ?>" style="display:<?php echo $visiblevisit;?>" />

     </td>
     <td align="center">
		 <span>
<!--botones agrupados-->
<div id="botones_com" style="display:<?php echo  $visiblevisit ?>; style="float: left;">
	<!--boton editar-->
<a href="main.php?key=62&Id=<?php echo $row_sql[$id]; ?>" class="btn btn-warning btn-lg float-left"><i class="fa fa-edit"></i></a>
	<!--boton eliminar-->
	<a href="javascript:borrado(<?php echo "$row_sql[$id],'$tabla','$id',$verdato"; ?>)"class="btn btn-danger btn-lg float-left" style="display:<?=$visible;?>"><i class="fa fa-trash"></i></a>


	      </td>
     <?php
		//Contenido
		foreach ($columnas as $valor){
			if($valor->name == "$id"){continue;}
			echo  '<td style="display:'.colvisible($valor->name).'">'.mask_val($row_sql[$valor->name],$valor->name).'</td>';
	}
		?>
      </tr>
    <?php } while ($row_sql = mysqli_fetch_assoc($sql))?>
    </tbody>
  </table>
