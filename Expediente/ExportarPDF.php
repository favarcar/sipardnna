<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
include("../conexion/conexion.php");
include ("../funshow.php");
$codigo_expediente=$_GET['codigo_expediente'];

$busqueda_pdf=mysqli_query($con,"SELECT * FROM expediente where codigo_expediente='$codigo_expediente' ");
while($row50=mysqli_fetch_array($busqueda_pdf)){
	
	$codigo_expediente=$row50['codigo_expediente'];
	$Fecha_inicio_expediente=$row50['Fecha_inicio_expediente'];
	$id_ninnos=$row50['id_ninnos'];
	$id_cuidadores=$row50['id_cuidadores'];
	$id_discapacidad=$row50['id_discapacidad'];
	$id_indicador=$row50['id_indicador'];
	$id_maltrato=$row50['id_maltrato'];
	$id_victima=$row50['id_victima'];
	$Descripcion_expediente=$row50['Descripcion_expediente'];
	$funcionario_actuacion_exp=$row50['funcionario_actuacion_exp'];
	$concepto_verificacion=$row50['concepto_verificacion'];
	$concepto_psicologico = $row50['concepto_psicologico'];
	$concepto_social = $row50['concepto_social'];
	$juzgamiento=$row50['juzgamiento'];
	$id_derecho=$row50['id_derecho'];
	$Observacion=$row50['Observacion'];
	$Veredicto_Caso=$row50['Veredicto_Caso'];
	$Fecha_finalizacion_expediente=fecha($row50['Fecha_finalizacion_expediente']);
	$id_entidad=$row50['id_entidad'];
	$id_usuario_exp=$row50['id_usuario_exp'];
	$id_estadocaso=$row50['id_estadocaso'];
	$fecha_limite=$row50['fecha_limite'];
	
}

$busquedanna=mysqli_query($con,"SELECT * FROM ninnosnna where id_ninnos='$id_ninnos' ");
while($row=mysqli_fetch_array($busquedanna)){
		
          $id_ninnos1=$row['id_ninnos'];
		  $No_identificacion=$row['No_identificacion'];
		  $Nombres=$row['Nombres'];
		  $Apellidos=$row['Apellidos'];
		  $id_municipio_hechos=$row['id_municipio_hechos'];

}
 $NombresCuida="";
 $ApellidosCuida="";
 $No_Cedula="";
$busqueCuidadores=mysqli_query($con,"SELECT * FROM cuidadores where id_ninos='$id_ninnos' ");
while($row1=mysqli_fetch_array($busqueCuidadores)){

		  //// cuidadores
		 $id_cuidadores=$row1['id_cuidadores'];
		 $id_tipo_documento=$row1['id_tipo_documento'];
		 $No_Cedula=$row1['No_Cedula'];
		 $NombresCuida=$row1['Nombres_cuidadores'];
		 $ApellidosCuida=$row1['Apellidos_cuidadores'];
		 $Fecha_Nacimiento=$row1['Fecha_Nacimiento'];
		 $Edad=$row1['Edad'];
		 $Direccion=$row1['Direccion'];
		 $telefono_movil=$row1['telefono_movil'];
		 $correo_electronico=$row1['correo_electronico'];
		 $id_parentesco=$row1['id_parentesco'];
		 $id_estado=$row1['id_estado'];
		 $id_estrato=$row1['id_estrato'];
		 $id_etnia=$row1['id_etnia'];
		 $id_genero=$row1['id_genero'];
		 $id_niveleducativo=$row1['id_niveleducativo'];
		 $id_regimen=$row1['id_regimen'];
		 $id_eps=$row1['id_eps'];
		 $id_municipio=$row1['id_municipio'];
		 $id_provincia=$row1['id_provincia'];
		 $id_zona=$row1['id_zona'];
		 $Puntaje_Sisben=$row1['Puntaje_Sisben'];
		 $fecha_cuida=fecha($row1['fecha_cuida']);
		 $id_usuario=$row1['id_usuario'];
		 $id_ninos=$row1['id_ninos'];
		 
		 		
                      
          	  
}

/*$id_usuario_exp ="";
$id_municipio ="";*/
$apellidos_usuario=""; 
$nombres_usuario=""; 
$busqueUsuario=mysqli_query($con,"SELECT * FROM usuarios where numero_documento='$id_usuario_exp' ");
while($row8=mysqli_fetch_array($busqueUsuario)){
		  
		  $id_usuario=$row8['id_usuario'];		
          $apellidos_usuario=$row8['apellidos'];    
		  $nombres_usuario=$row8['nombres']; 
		  $id_municipiousu=$row8['id_municipio']; 


}

$des_derecho ="";
$busqueDerecho=mysqli_query($con,"SELECT * FROM derechos where id_derecho='$id_derecho' ");
while($row1=mysqli_fetch_array($busqueDerecho)){
		  
		  $id_derecho=$row1['id_derecho'];		
          $des_derecho=$row1['descripcion_derechos'];             
	  
}



$des_municipio_hechos ="";
$busqueMunicipio=mysqli_query($con,"SELECT * FROM municipios where id_municipio='$id_municipiousu' ");
while($row9=mysqli_fetch_array($busqueMunicipio)){
		  
		  $id_municipio_hechos=$row9['id_municipio'];		
          $des_municipio_hechos=$row9['descripcion'];             
	  
}
 
$des_discapacidad=""; 
$busqueda2=mysqli_query($con,"SELECT * FROM discapacidades where id_discapacidad='$id_discapacidad' ");
while($row2=mysqli_fetch_array($busqueda2)){
		  
		  $id_discapacidad=$row2['id_discapacidad'];		
          $des_discapacidad=$row2['descripcion_discapacidades'];             
}

$des_indicador="";
$busqueda3=mysqli_query($con,"SELECT * FROM indicadores where id_indicador='$id_indicador' ");
while($row3=mysqli_fetch_array($busqueda3)){
		  
		  $id_indicador=$row3['id_indicador'];		
          $des_indicador=$row3['descripcion_indicadores'];             
	  
}

$des_maltrato ="";
$busqueda4=mysqli_query($con,"SELECT * FROM maltratos where id_maltrato='$id_maltrato' ");
while($row4=mysqli_fetch_array($busqueda4)){
		  
		  $id_maltrato=$row4['id_maltrato'];		
          $des_maltrato=$row4['descripcion_maltratos'];             
	  
}

$des_victima ="";
$busqueda5=mysqli_query($con,"SELECT * FROM victimas where id_victima='$id_victima' ");
while($row5=mysqli_fetch_array($busqueda5)){
		  
		  $id_victima=$row5['id_victima'];		
          $des_victima=$row5['descripcion_victimas'];             
	  
}

$des_entidad="";
$busqueda6=mysqli_query($con,"SELECT * FROM entidades where id_entidad='$id_entidad' ");
while($row6=mysqli_fetch_array($busqueda6)){
		  
		  $id_entidad=$row6['id_entidad'];		
          $des_entidad=$row6['descripcion_entidades'];             
	  
}

$des_estadocaso="";
$busqueda1=mysqli_query($con,"SELECT * FROM estado_caso where id_estadocaso='$id_estadocaso' ");
while($row1=mysqli_fetch_array($busqueda1)){
		  
		  $id_estadocaso=$row1['id_estadocaso'];		
          $des_estadocaso=$row1['descripcion_estado_caso'];             
	  
}




date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha=  date("d-m-Y", $time);
	$fecha_actual=  date("d-m-Y  (H:i:s)", $time);
	
//Fechas

$datetime1 = new DateTime($fecha_limite);
$datetime2 = new DateTime($fecha);
$interval = $datetime2->diff($datetime1);
$contador=  $interval->format('%a días');


require_once ('dompdf/autoload.inc.php');

use Dompdf\Dompdf;





 
// Introducimos HTML con los datos del expoediente

$html = "<html><head>
<title></title>
<style>
body {
  font-family: Arial, Helvetica, Verdana;
}
.wrap,
.wrap2{ 
  width:680px;
  white-space: pre-wrap;      /* CSS3 */   
  white-space: -moz-pre-wrap; /* Firefox */    
  white-space: -pre-wrap;     /* Opera <7 */   
  white-space: -o-pre-wrap;   /* Opera 7 */    
  word-wrap: break-word;      /* IE */
}

.wrap{

  height:auto;
}

.wrap2 { 
  border:1px solid blue;
  height:100px;
  overflow: auto;
  width:100px;
}



</style>
</head><body>
<div>


<img class='img-responsive  center-block  borde_blanco'  src='../img/Logos_01.png' width='55%' alt=''/>
</div>
<br>
<br>
<b>Fecha: </b>$fecha_actual
<br>
<br>
<b>Codigo del Expediente:</b> $codigo_expediente
<br>
<b>Nombre:</b>  $nombres_usuario $apellidos_usuario
<br>
<b>Municipio:</b> $des_municipio_hechos 

<br>
<br>
<br>
Alerta faltan <b>$contador</b> calendario para resolver el caso por Restablecimiento de Derechos.
En caso de no ser resuelto el caso caduca por vencimiento de términos.
<br>
<br>
<b>Nombre de Niño, Niña o Adolescente:</b> $Apellidos $Nombres 
<br>
<b>No. de Documento de N.N.A.:</b> $No_identificacion
<br>
<b>Nombre de Madre, Padre o Acudiente:</b> $ApellidosCuida $NombresCuida
<br>
<b>No. de Documento de Madre, Padre o Acudiente:</b> $No_Cedula
<br><br><br>
<table>
<tr>
<td><b>Restablecimiento de Derechos:</b><br> $des_derecho </td>
<td><b>Discapacidad:</b><br> $des_discapacidad</td>
<td><b>Maltrato:</b><br> $des_maltrato</td>
</tr>


<tr>
<td><br><b>Concepto de Verificación Comisar&iacute;a</b><br>$concepto_verificacion</td>
<td><br><b>Concepto de Verificaci&oacute;n Psicol&oacute;gico </b><br> $concepto_psicologico</td>
<td><br><b>Concepto de Verificaci&oacute;n Trabajador/a Social</b><br> $concepto_social</td>
</tr>

<tr>
<td><br><b>Victimas:</b><br> $des_victima</td>
<td><br><b>Descripción</b><br> $Descripcion_expediente   </td>
<td><b>Juzgamiento</b><br> $juzgamiento</td>
</tr>

<br><br><br>
<tr>
<td><br><b>Observaciones</b><br>$Observacion </td>
<td><br><b>Veredicto del Caso</b><br>$Veredicto_Caso </td>
<td><br><b>Estado del Expediente:</b><br> $des_estadocaso</td>
</tr>
</table>
<b>Fecha de Inicio del Expediente:</b> $Fecha_inicio_expediente
<br><b>Fecha limite del Expediente:</b> $fecha_limite
<br><br><br><br>
<footer>
<div>
<img class='img-responsive  center-block  borde_blanco'  src='../img/footer.png' width='100%' alt=''/>
</div>
</footer>


</body></html>" ;

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new Dompdf();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "portrait");
 
// Cargamos el contenido HTML.
$pdf->load_html($html);
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('Expediente.pdf', array("Attachment" => 1));