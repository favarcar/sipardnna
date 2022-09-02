

<?php  
$cod_uso = $_GET['Id'];
$tabla = "indicadores";
$id = "id_indicador";

$usosql = mysqli_query($con,"DESCRIBE $tabla");
$rusosql = mysqli_fetch_assoc($usosql); 

$uso = mysqli_query($con, "SELECT * FROM $tabla WHERE $id = '$cod_uso'")or die(mysqli_error($con));
	 $row_uso = mysqli_fetch_assoc($uso);
      $total_sui = mysqli_num_rows($uso);?>

<div class="box">
<div class="box-header with-border">
                      <h3 class="box-title">Ver clasificación del proceso</h3>
                      <a href="main.php?key=80" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Regresar</a>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse"> <i class="fa fa-minus"></i></button>
                      </div>
                    </div>
<div class="box-body">
    
<table class="table">
  <?php do{?>
    <?php if ( $rusosql['Key'] == "PRI"){
      continue;
    }

    ?>
    
  <tr style="display:<?php echo  $rusosql['Field'];?>">
     
    <td width="44%" align="right"><strong><?php echo strtoupper(str_replace("_"," ", $rusosql['Field']))?></strong></td>
    <td width="56%">
<?php 
	

	echo mask_val($row_uso[$rusosql['Field']], $rusosql['Field']); 
	
	?></td>
  </tr>
   <?php } while ($rusosql = mysqli_fetch_assoc($usosql)); ?>
<!--Botones de acción de la página ver conceptos-->
   <a href="main.php?key=81&Id=<?php echo $cod_uso ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a>
<!--<button class="btn btn-primary" id="imprimir" data-id="<?=$cod_uso?>"><i class="fa fa-print"></i>Imprimir</button>-->


</table>
<div class="container" style="padding-top: 24%;"></div>
    </div>
    </div>
    