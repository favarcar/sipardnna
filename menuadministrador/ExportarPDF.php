<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
include("../conexion/conexion.php");
$codigo_expediente=$_GET['codigo_expediente'];

$busqueda50=mysql_query("SELECT * FROM expediente where codigo_expediente='$codigo_expediente' ");//cambiar nombre de la tabla de busqueda
while($row50=mysql_fetch_array($busqueda50)){
	
	 $codigo_expediente=$row50['codigo_expediente'];
	$Fecha_inicio_expediente=$row50['Fecha_inicio_expediente'];
	$id_ninnos=$row50['id_ninnos'];
	$id_cuidadores=$row50['id_cuidadores'];
	$id_discapacidad=$row50['id_discapacidad'];
	$id_indicador=$row50['id_indicador'];
	$id_maltrato=$row50['id_maltrato'];
	$id_victima=$row50['id_victima'];
	$Descripcion_expediente=$row50['Descripcion_expediente'];
	$id_derecho=$row50['id_derecho'];
	$Observacion=$row50['Observacion'];
	$Veredicto_Caso=$row50['Veredicto_Caso'];
	$Fecha_finalizacion_expediente=$row50['Fecha_finalizacion_expediente'];
	$id_entidad=$row50['id_entidad'];
	$id_usuario_exp=$row50['id_usuario_exp'];
	$id_estadocaso=$row50['id_estadocaso'];
	$fecha_limite=$row50['fecha_limite'];
	
}

$busqueda=mysql_query("SELECT * FROM ninnosnna where id_ninnos='$id_ninnos' ");//cambiar nombre de la tabla de busqueda
while($row=mysql_fetch_array($busqueda)){
		
          $id_ninnos1=$row['id_ninnos'];
		  $No_identificacion=$row['No_identificacion'];
		  $Nombres=$row['Nombres'];
		  $Apellidos=$row['Apellidos'];
}
$busqueda1=mysql_query("SELECT * FROM cuidadores where id_ninos='$id_ninnos' ");//cambiar nombre de la tabla de busqueda
while($row1=mysql_fetch_array($busqueda1)){

		  //// cuidadores
		 $id_cuidadores=$row1['id_cuidadores'];
		 $id_tipo_documento=$row1['id_tipo_documento'];
		 $No_Cedula=$row1['No_Cedula'];
		 $NombresCuida=$row1['Nombres'];
		 $ApellidosCuida=$row1['Apellidos'];
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
		 $fecha_cuida=$row1['fecha_cuida'];
		 $id_usuario=$row1['id_usuario'];
		 $id_ninos=$row1['id_ninos'];
		 
		 		
                      
          	  
}

$busqueda1=mysql_query("SELECT * FROM derechos where id_derecho='$id_derecho' ");
while($row1=mysql_fetch_array($busqueda1)){
		  
		  $id_derecho=$row1['id_derecho'];		
          $des_derecho=$row1['descripcion'];             
	  
}
 
$busqueda2=mysql_query("SELECT * FROM discapacidades where id_discapacidad='$id_discapacidad' ");
while($row2=mysql_fetch_array($busqueda2)){
		  
		  $id_discapacidad=$row2['id_discapacidad'];		
          $des_discapacidad=$row2['descripcion'];             
}

$busqueda3=mysql_query("SELECT * FROM indicadores where id_indicador='$id_indicador' ");
while($row3=mysql_fetch_array($busqueda3)){
		  
		  $id_indicador=$row3['id_indicador'];		
          $des_indicador=$row3['descripcion'];             
	  
}

$busqueda4=mysql_query("SELECT * FROM maltratos where id_maltrato='$id_maltrato' ");
while($row4=mysql_fetch_array($busqueda4)){
		  
		  $id_maltrato=$row4['id_maltrato'];		
          $des_maltrato=$row4['descripcion'];             
	  
}
$busqueda5=mysql_query("SELECT * FROM victimas where id_victima='$id_victima' ");
while($row5=mysql_fetch_array($busqueda5)){
		  
		  $id_victima=$row5['id_victima'];		
          $des_victima=$row5['descripcion'];             
	  
}
$busqueda6=mysql_query("SELECT * FROM entidades where id_entidad='$id_entidad' ");
while($row6=mysql_fetch_array($busqueda6)){
		  
		  $id_entidad=$row6['id_entidad'];		
          $des_entidad=$row6['descripcion'];             
	  
}
$busqueda1=mysql_query("SELECT * FROM estado_caso where id_estadocaso='$id_estadocaso' ");
while($row1=mysql_fetch_array($busqueda1)){
		  
		  $id_estadocaso=$row1['id_estadocaso'];		
          $des_estadocaso=$row1['descripcion'];             
	  
}

date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha=  date("Y-m-d", $time);
	$fecha_actual=  date("Y-m-d  (H:i:s)", $time);


$datetime1 = new DateTime($fecha_limite);
$datetime2 = new DateTime($fecha);
$interval = $datetime1->diff($datetime2);
$contador=  $interval->format('%R%a días');

require_once ('dompdf/dompdf_config.inc.php');





 
// Introducimos HTML de prueba

$html = "<html>
<head>
<title></title>
<style>
body {
  font-family: Arial, Helvetica, Verdana;
}
</style>
</head>
<body >
<div>
<img class='img-responsive  center-block  borde_blanco'  src='../img/Logos_01.png' width='30%' alt=''/>
</div>
<br>
<br>
$fecha_actual
<br>
<br>
<b>Codigo del Expediente:</b> $codigo_expediente
<br>
<b>Fecha de Inicio del Expediente:</b> $Fecha_inicio_expediente
<br>
<b>Fecha limite del Expeidente:</b> $fecha_limite
<br>
<br>
Alerta faltan <b>$contador</b> calendario para resolver el caso por Restablecimiento de Derechos.
En caso de no ser resuelto el caso caduca por vencimiento de términos.
<br>
<br>
<b>Nombre de Niño, Niña o Adolecente:</b> $Apellidos $Nombres 
<br>
<b>No. de Documento de Niño, Niña o Adolescente:</b> $No_identificacion
<br>
<br>
<b>Nombre de Madre, Padre o Adolescente:</b> $ApellidosCuida $NombresCuida
<br>
<b>No. de Documento de Madre, Padre o Acudiente:</b> $No_Cedula
<br> 
<br>
<b>Restablecimiento de Derechos:</b> $des_derecho
<br>
<b>Discapacidad:</b> $des_discapacidad
<br>
<b>Indicador:</b> $des_indicador
<br>
<b>Maltrato:</b> $des_maltrato
<br>
<b>Victimas:</b> $des_victima
<br>
<br>
<div align='center'><b>Descripción</b></div> <br> <div align='justify'> $Descripcion_expediente </div>  
<br>
<br>
<div align='center'><b>Observaciones</b> </div>  <br> <div align='justify'> $Observacion </div> 
<br>
<br>
<div align='center'><b>Veredicto del Caso</b></div> <br> <div align='justify'> $Veredicto_Caso </div>
<br>
<b>Fecha De Finalización del Expediente:</b> $Fecha_finalizacion_expediente
<br>
<b>Entidad:</b>  $des_entidad
<br>
<b>Estado del Expediente:</b> $des_estadocaso

</body></html>" ;
 
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "portrait");
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('FicheroEjemplo.pdf');