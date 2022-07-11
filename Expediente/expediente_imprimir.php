<?php
//CERTIFICADO ORIGINAL SOGAMOSO
//Se recibe la variable
$id_cer = base64_decode(htmlspecialchars($_GET['Id']));
$user = htmlspecialchars($_GET['User']);
//

?>

<?php
require_once('mpdf/mpdf.php');
require_once('mpdf/qrcode/qrcode.class.php');

include("cone.php");
include ('funshow.php');


//se define la fecha actual que se utilizara mas adelante
$fecha = date('Y-m-d');

//se crea el documento pdf
$mpdf = new mPDF( 'c','letter',0,'', 10, 10, 10, 0, 0, 0);



//Se elimina la coma al final si la tiene
$ids_cer = rtrim($id_cer,",");
//se convierte en array
$allids = explode(",", $ids_cer);
// se cuenta el numero de certificados a aprobar
$arrlength = count($allids);


$numpag = $arrlength;
$numreg = 0;
	//comienza el ciclo

for($x = 0; $x < $arrlength; $x++){

//se establece un contador
$numreg++;

//Datos de certificado estratificación
$cer = mysqli_query($cone,"SELECT * FROM certificados WHERE Id_certifica = '".$allids[$x]."'")or die(mysqli_error($cone));
$row_cer = mysqli_fetch_assoc($cer);

//Datos del certificado para imprimir
//$datoscer = mysqli_query($cone,"SELECT * FROM datos_certificado WHERE Id_dato = '{$row_cer['Id_datcer']}'")or die(mysqli_error($cone));
$datoscer = mysqli_query($cone,"SELECT * FROM datos_certificado ORDER BY Id_dato DESC LIMIT 1")or die(mysqli_error($cone));
$row_datoscer = mysqli_fetch_assoc($datoscer);

//Datos de usuario para la firma
$nombrejefe = consulta_campo('usuarios','Usuario',$row_datoscer['Jefe'],'Nombres');
$nombresuperv = consulta_campo('usuarios','Usuario',$row_datoscer['Supervisor'],'Nombres');
$firmajefe = consulta_campo('usuarios','Usuario',$row_datoscer['Jefe'],'Firma');
$firmasuperv = consulta_campo('usuarios','Usuario',$row_datoscer['Supervisor'],'Firma');

//Dependiendo del tipo de certificado urbano o rural se muestran los decretos
if($row_cer['Tipo'] == 'URBANA'){
  $decreto = $row_datoscer['decreto_urbano'];
   $visurb = "table-row";
   $ubicacion="BARRIO:";
	}else if($row_cer['Tipo'] == 'CENTRO POBLADO'){
			$visurb = "none";
			$ubicacion="CENTRO POBLADO:";
    }else{
	  $decreto = $row_datoscer['decreto_rural'];
	    $visurb = "none";
		 $ubicacion="VEREDA:";
    }

//Se crea la imagen temporalmente en la carpeta img/firma
$img1 = str_replace('data:image/png;base64,', '', $firmajefe);
$img2 = str_replace('data:image/png;base64,', '', $firmasuperv);

file_put_contents('img/'.$nombrejefe.'firma.png', base64_decode($img1));
file_put_contents('img/'.$nombresuperv.'firma.png', base64_decode($img2));
chmod("img/".$nombrejefe."firma.png",0700);
chmod("img/".$nombresuperv."firma.png",0700);
//Condición para imprimir la firma digitalizada
if ($row_datoscer['Print_firma'] == 1){
//$img_firma = 'url('.$file.') no-repeat top center';
$img_firma1 = 'url(img/'.$nombrejefe.'firma.png) no-repeat center';
$img_firma2 = 'img/'.$nombresuperv.'firma.png';
}else{
	$img_firma1 = '';
	$img_firma2 = 'img/blank.png';
		}
//Mensaje para el qr
$msgqr = 'Radicado:'.$row_cer['Radicado'].'
 Predial:'.$row_cer['Cod_catastro'].
' Solicita:'.$row_cer['Nombres'].
' Documento:'.$row_cer['Nombres'].
' Estrato:'.$row_cer['Estrato'].
' Fecha:'.fecha($fecha).
' Clave:'.crypt($id_cer,'35tr@to5_3n_S0g@');

$html = '
<style>
@page{
	margin-top: 0px;

}
</style>
<body onLoad="window.print()" onBlur="window.close();">
<div id="printborder" class="mediacarta">

  <table width="100%" border="0">
    <tr>
      <td width="7%">
	  <img width="81" height="74" src="images/logo2.jpg" alt="LOGO.JPG"/>
	  </td>
      <td width="86%" align="center"><strong>MUNICIPIO DE SOGAMOSO<br>
MACROPROCESO: GESTIÓN  ESTRATÉGICA DE LA COMUNICACION<br>
PROCESO: GESTION DE LA  COMUNICACIÓN ORGANIZACIONAL</strong></td>
      <td width="7%"><img src="images/logo.gif" alt="logo2" width="68" height="72"></td>
    </tr>
  </table>
  <p align="center"><strong>LA  OFICINA ASESORA DE PLANEACIÓN MUNICIPAL, CERTIFICA LA SIGUIENTE VIVIENDA, PARA  EFECTOS DE SOLICITAR  SERVICIOS PÚBLICOS  DOMICILIARIOS  EN LA  ZONA </strong>'.$row_cer['Tipo'].'</p>
  <table width="100%" border="0" cellpadding="0" cellspacing="1" class="normaltext">
    <tr>
      <td width="80%"  align="left">SOLICITANTE:<strong>'.$row_cer['Nombres'] .'</strong>      </td>
      <td width="20%" align="right"><strong>Radicado:'.$row_cer['Radicado'] .'</strong></td>
    </tr>
    <tr>
      <td align="left">C.C. <strong>'.$row_cer['Documento'] .'</strong>    </td>
      <td align="right" width="34%">FECHA  DE EXPEDICIÓN<strong>:'.fecha($fecha) .'</strong></td>
    </tr>
    <tr style="display:'.$visurb.'">
      <td align="left"><div style="display:'.$visdane.'">CÓDIGO  DANE Nº:<strong> '.$row_cer['Sector'] .' '.$row_cer['Seccion'].' '.$row_cer['Manzana'].'</strong></div>UEE: <strong>'.$row_cer['Uee'] .'</strong> COSTADO: <strong>'.$row_cer['Lado_manzana'] .'</strong></td>
      <td align="right">ZONA GEO: <strong>'.$row_cer['Zona_geo'] .'</strong></td>
    </tr>
    <tr>
      <td height="32" align="left">DIRECCIÓN: <strong>'.$row_cer['Direccion'].'</strong>  '.$ubicacion.' <strong>'.substr($row_cer['Barrio'], 0, 15).'</strong>   <br>
      CÓD. CATASTRAL: <strong>'.$row_cer['Cod_catastro'] .'</strong></td>
      <td height="32" align="right">ESTRATO:<strong>'.estrato($row_cer['Estrato']) .'</strong></td>
    </tr>
  </table>
<div>'.$decreto .'</em></div>
  <div style="">
<img src="http://localhost/estratificacion/admin/mpdf/qrcode/image.php?msg='.$msgqr.'&err=urlencode("L")" alt="generation qr-code" width="80px" style="float:right; margin-top:30px"/>

<div id="firma" style="height:80px; width:100%; background:#fff '.$img_firma1.' ;background-size:40%; padding:60 0 0 0;">
<div style="text-align:center; padding-top:30;background-size:40%;">
<strong>'.strtoupper($nombrejefe).'</strong><br />
<strong>JEFE OFICINA ASESORA DE PLANEACIÓN</strong>
<img src="'.$img_firma2.'" width="100px" style="float:left; margin-top:0px"/>
</div>
</div>

  <div align="left" class="proyectotext">
   Proyectó: '.$row_datoscer['Proyecto'] .'<br>
  Reviso: '.$row_datoscer['Reviso'] .'
  </div>
   <div align="center"><strong>'.$row_datoscer['Lema'] .'</strong><br>
    Edificio Torre 6 Centro de Negocios, Calle 15 # 12-14 piso 4. PBX: 7 702040-41 Ext 106 Fax: Ext.  224<br>
  <a href="http://www.sogamoso-boyaca.gov.co/">www.sogamoso-boyaca.gov.co</a> -  planeacion@sogamoso-boyaca.gov.co<br>
  <strong>&ldquo;SUAMOX, C</strong><strong>iudad del Sol&rdquo;</strong></div>
</div>
</body>
 ';

$html2 = '<div style="padding-top: 10px; color:red; font: Arial; font-size:24;">Este certificado no ha sido aprobado por el Supervisor</div>';



//$mpdf->showImageErrors = true;

$css = file_get_contents('css/certificado_style.css');
$mpdf->WriteHTML($css,1);
$mpdf->SetProtection(array('print'),'', 'planeasoga');
//$mpdf->SetFooter($piepag);
$mpdf->charset_in = 'utf-8';

// Se revisa si fue aprobado por el supervisor
if (!($row_cer['Id_datcer'])){
$mpdf->WriteHTML($html2);
}else{
	$mpdf->WriteHTML($html);
    $mpdf->WriteHTML($html);
}


$mpdf->SetWatermarkImage('img/watermark_escudo.jpg');

$mpdf->showWatermarkImage = true;
//$mpdf->debug = true;
//unlink("img/firma.png");
	//Se establece condicion para eliminar la ultima página
if ($numreg < $numpag){
	$mpdf->AddPage();

}
//Se guarda el pdf original para futuras consultas
//	$mpdf->Output('filename.pdf', \evidencias\Destination::FILE);

	//fin for
}


$mpdf->Output('cer_estrati.pdf','I');

//$mpdf->debug = true;

//en caso de solicitarlo en linea

if($_GET['radicadoresp']){
$radicado = 	base64_decode($_GET['radicadoresp']);
$mpdf->Output('../estratifica_online/radicados/salida/'.trim($radicado).'.pdf','F');

//se envia copia del formulario de solicitud FTP
$server = "192.168.0.3";
$ftp_user_name = "orfeoplanea";
$ftp_user_pass = "orfeoPLANEACION@";
$dir = "bodega/".date("Y")."/120/docs/";
$source = "../estratifica_online/radicados/salida/".trim($radicado).".pdf";
$dest = $dir.$radicado.".pdf";

$connection = ftp_connect($server) or die("Could not connect to $server");

$login = ftp_login($connection, $ftp_user_name, $ftp_user_pass);
//echo "<br>". $connection, $ftp_user_name, $ftp_user_pass;

if (!$connection || !$login) { die('Parece que no se puede conectar'); }

$upload = ftp_put($connection, $dest, $source, FTP_BINARY);

if (!$upload) { //echo 'Fallo la subida al FTP';
}

ftp_close($connection);
//Fin codigo FTP
}


unlink("img/".$nombrejefe."firma.png");
unlink("img/".$nombresuperv."firma.png");




?>
