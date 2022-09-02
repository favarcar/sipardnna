<?php
$tabla="maltratos";
$id="id_maltrato";
$keydes = 92;
$cod_uso = $_GET['Id'];
//Consulta para listar los campos y sus propiedades para construir el formulario
$field_tit = mysqli_query($con,"DESCRIBE $tabla");
$r_fieldi_tit = mysqli_fetch_assoc($field_tit);

//print_r($rusosql);

//Consulta para mostar los valores de los campos
   $sql = mysqli_query($con, "SELECT * FROM $tabla ORDER BY $id = '$cod_uso' DESC")or die(mysqli_error($con));
   	 $row_sql = mysqli_fetch_assoc($sql);
	 
?>

                    <div class="box-header with-border">
                      <h3 class="box-title">Editar - Tipo de maltrato</h3>
                      <a href="main.php?key=90" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Regresar</a>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse"> <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
                      </div>
                    </div>
<div class="box-body">
  <form action="main.php?key=<?= $keydes ?>&Id=<?php echo $cod_uso; ?>" method="post" enctype="multipart/form-data" >


    <?php do{?>
   <div style="display:<?php if ($r_fieldi_tit['Key'] == "PRI"){ echo "none"; } else { echo "inline"; } ?>">

  		<strong><?php echo mask_field($r_fieldi_tit['Field']) ?></strong></div>
    <?php
  //Si es la actividad, cargue el listado de actividades
  if($r_fieldi_tit['Key'] == "PRI"){
  		continue;
}else if($r_fieldi_tit['Field'] == "Id_area"){

echo '<select name="'.$r_fieldi_tit['Field'].'" class="form-control js-example-basic-single" required="required">';
echo '<option value="'.$row_sql[$r_fieldi_tit['Field']].'" selected> '.$row_sql[$r_fieldi_tit['Field']].' </option>';
do{

	echo '<option value="'.$row_area['Id_area'].'">'.($row_area['Area']).'</option>';
    } while ($row_area = mysqli_fetch_assoc($area));echo '</select>';

     }else{


     echo define_input($r_fieldi_tit['Type'], $r_fieldi_tit['Field'], $row_sql[$r_fieldi_tit['Field']], $r_fieldi_tit['Null'] );
      }
      ?>

     <?php } while ($r_fieldi_tit = mysqli_fetch_assoc($field_tit)); ?>

  <p align="center"><input  class="btn btn-warning pull-left" type="submit" id="nuevo" value="Editar">
  </form>

</div>
