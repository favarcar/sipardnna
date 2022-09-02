<?php 

$ideven =  $_GET['Id'];
$tabla = "discapacidades";
$id = "id_discapacidad";

//Se realiza la toma de columnas de la tabla via
$eventosql = mysqli_query($con,"DESCRIBE $tabla");
$rusosql = mysqli_fetch_assoc($eventosql); 

//Se realiza la consutla del evento como tal
$evento = mysqli_query($con, "SELECT * FROM $tabla WHERE $id = '$ideven'")or die(mysqli_error($con));
$row_even = mysqli_fetch_assoc($evento);
 

?>

<h2>Evento</h2>
<div class="x_panel">
                  <div class="x_title">
                    <h2>Consultar Discapacidades</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li style="display:<?php echo $visible; ?>"><a href="javascript:borrado(<?php echo $row_even['Id_evento'];?>,'eventos','Id_evento',206)"><img src="images/eliminar.png" alt="" width="32" height="32" title="Borar caso" />Eliminar caso</a>
                        </li>
                        <li><a href="main.php?key=208&Id=<?php echo $row_even['Id_evento'] ?>"><img src="images/editar.png" width="32" height="32">Editar Caso</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                    <div class="clearfix"></div>
  </div>
  <div class="x_content">


<p><strong>Revisar Datos</strong></p>
<form name="form1" method="post" action="main.php?key=201">
  <div class="table-responsive">
<table>	  
	  <?php do{?>
  <tr style="display:<?php if ($rusosql['Key'] == "PRI"){ echo "none"; } else { echo "table-row"; } ?>">
    <td width="44%" align="right"><strong><?php echo mask_field($rusosql['Field'])?>:</strong></td>
    <td width="56%"><?php 
	//El campo es la fecha, aplicar formato fecha
	if($rusosql['Field'] == "Id_teven" || $rusosql['Field'] == "Id_area" ){
 echo "Visualizar datos";
		}else{
	echo mask_val($row_even[$rusosql['Field']],$rusosql['Field']);
	}
	?></td>
  </tr>
   <?php } while ($rusosql = mysqli_fetch_assoc($eventosql)); ?>
<!--Botones de acción de la página ver conceptos-->
	  </table>
	
  <table class="table">
   
    <tr valign="baseline">
      <td>
        
        <button type="button" title="Subir evidencias" name="Subir_files" class="btn btn-info btn-lg loadev" data-toggle="modal" data-target="#CargarEvidencias" data-id="0"><i class="fa fa-upload"></i></button>
        <button type="button" title="Ver Evidencias" id="ver_files" name="ver_files" class="btn btn-info btn-lg evfoto" data-toggle="modal" data-target="#VerEvidencias" data-id="0" data-caso="<?php echo $row_even['Id_evento'] ?>"><i class="fa fa-camera"></i></button></td>
      
    </tr>
    <tr valign="baseline">
      <td></td>
    </tr>
  </table>


  </div>
</form>
	  <div id="map"></div>
</div>
</div>

<div class="x_panel">
                  <div class="x_title">
                    <h2><small>Registrar Actividades a este evento</small></h2>
                   <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
  </div>
<div class="x_content" style="display:<?php echo $visibleinsp2 ?>">
<!--Boton registrar intervención-->
<a href="main.php?key=210&Id=<?php echo $ideven ?>" class="btn btn-primary">Registrar Actividades</a>

<?php 
////////////////////INICIO DE CARGA DE IMAGENES ///////////////////////	
	
	$directorio = 'evidencias/'.$ideven.'/';

if(isset($_FILES['archivo'])){
	//se comprueba la existecia del directorio
	if(file_exists($directorio) == false ){
		
		echo '<div class="alert alert-danger">Este directorio no existe, creando directorio... <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button></div>';
		mkdir_recursivo($directorio,0777);
		}; 
	
//si se envian los archivos
	
 foreach ($_FILES['archivo']['error'] as $key => $error) {
	 //se iniicia el ciclo de repetición por cada archivo seleccionado
$tamanio = $_FILES['archivo']['size'][$key];
$separador = explode(".", $_FILES["archivo"]["name"][$key]);
$extension = $separador[1];
 
 if ($error == UPLOAD_ERR_OK) {	 
	//si la carga de cada archivos es exitosa 
 //echo "$error_codes[$error]";
 
 if($extension == "jpg" || $extension == "jpeg" || $extension == "JPEG" || $extension == "JPG" && $tamanio <= $_POST['MAX_FILE_SIZE']){ //inicia validacion de nombre de archivo	
		
	echo '<p class="alert alert-success">El archivo '.$_FILES["archivo"]["name"][$key].' ha cargado con exito <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button></p>';
	
	$nombre = $_FILES["archivo"]["name"][$key]."_".$ideven."_".$_POST['Id_activ']."_".time().".".$extension;
	//Se ingresan los datos de las imagenes.
	mysqli_query($con,"INSERT INTO fotos (Id_evento, Id_activ, Nombre) VALUES('$ideven','{$_POST['Id_activ']}','$nombre' )") or Die(mysqli_error($con));

move_uploaded_file($_FILES["archivo"]["tmp_name"][$key], $directorio.$nombre) or die("Ocurrio un problema al intentar subir el archivo.");

 $guardadoen = $directorio.$nombre;
 
        chmod($guardadoen,0777);
	
	}else{
		//Si no se cumple con la validación se envia mensaje de error
		
			echo '<p class="alert alert-warning">El archivo '.$_FILES["archivo"]["name"][$key].' no cumple con las condiciones apropiadas, tambien puede tener un tamaño muy grande  '.round($tamanio/1024).'KB <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button></p>
';
			}//finaliza condicion de validación


 }//finaliza condición de $_POST[error
 

 
 }
 unset($_FILES['archivo']);
unset($_POST['Regcontrol']);
 
}



	?>
<div class="table-responsive">
<table id="evidencias" class="table" style="display:<?php echo $tabcontrol ?>">
  <tr>
    <td width="8%"><strong>Fecha inicial</strong></td>
    <td width="8%"><strong>Fecha final</strong></td>
	<td width="20%"><strong>Descripción</strong></td>
    <td width="20%"><strong>Artista</strong></td>
    <td width="12%"><strong>No. de Contrato</strong></td>
    <td width="15%"><strong>Registro Fotográfico</strong></td>
    <td width="12%" style="display:<?php echo $visible_cell ?>;"><strong>Acciones</strong></td>
  </tr>
  <?php do{?>
  <tr>
    <td><?php echo fecha($row_control['Fecha_ini']) ?></td>
	<td><?php echo fecha($row_control['Fecha_fin']) ?></td>
    <td><?php echo $row_control['Descripcion'] ?></td>
    <td><?php echo mul_artists($row_control['Artistas']) ?></td>
    <td><?php echo $row_control['No_contrato'] ?></td>
    <td>
    
	<button type="button" title="Subir evidencias" name="Subir_files" class="btn btn-info btn-lg loadev" data-toggle="modal" data-target="#CargarEvidencias" data-id="<?php echo $row_control['Id_activ'] ?>"><i class="fa fa-upload"></i></button>
      
	<button type="button" title="Ver Evidencias" id="ver_files" name="ver_files" class="btn btn-info btn-lg pull-left evfoto" data-toggle="modal" data-target="#VerEvidencias" data-id="<?php echo $row_control['Id_activ'] ?>"><i class="fa fa-camera"><span class="badge"><?php echo num_evidencias($row_control['Id_activ']); ?></span></i></button>
      
      
    </td>
    <td style="display:<?php echo $visible_cell ?>;">
    <!--Boton borrar-->
		<button  onclick="borrado(<?php echo $row_control['Id_activ'];?>,'actividades','Id_activ',<?php echo $verdato; ?>)" class="btn btn-danger btn-lg"><i class="fa fa-eraser"></i></button>
	
    </td></td>
  </tr>
  <?php } while ($row_control = mysqli_fetch_assoc($control))?>
</table>
</div>



</div>
</div>


<!-- Modal -->
<div id="CargarEvidencias" class="modal fade" role="dialog">
  <div class="modal-dialog">
   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cargar Evidencias</h4>
      </div>
      <div class="modal-body">
   <form action="" method="POST" enctype="multipart/form-data" name="regfoto" id="regfoto">
    <input name="archivo[]" class="multi" maxlength="5" type="file"  multiple size="16" accept="image/*" capture="camera" required />
    <input type="hidden" name="MAX_FILE_SIZE" value="1048576"/>
    <input type="hidden" id="Id_activ" name="Id_activ" value="" />
      
</form>
    
      </div>
      <div class="modal-footer">
        <button type="submit" name="sendphoto" onclick="document.getElementById('regfoto').submit()" id="sendphoto" value="Cargar" class="btn btn-primary"><i class="fa fa-upload"></i>Cargar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>

    </div>

  </div>
</div>


<!-- Modal -->
<div id="VerEvidencias" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ver  Evidencias</h4>
      </div>
      <div id="show_fotosev" class="modal-body" style="height: 400px;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>

    </div>

  </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div id="Reg_control" class="modal fade" role="dialog">
  <div class="modal-dialog">
   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar intervención</h4>
      </div>
      <div class="modal-body" style="height: 400px;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>

    </div>

  </div>
</div>
<!-- Modal -->

