<meta charset="utf-8"/>


<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Consultar Cursos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        
        <link rel="stylesheet" href="../../css/bootstrap.css">

        <style>
            body {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        </style>


        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/font-awesome.min.css">


        <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,600italic' rel='stylesheet' type='text/css'>

        <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
         <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
        <script type="text/javascript" src="engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->

	</head>
 <body class="fblanco">
<script language="JavaScript">
function Borra(idcliente)
{
var agree=confirm("¿Realmente desea eliminar el cliente seleccionado?");
if (agree) { document.location="eliminar.php?id="+idcliente; }
else return false ;
}
</script>

<form name="form1" method="post" action="RemitirJuezfamilia.php" id="cdr" >
  <center>
    <h3 class="centrar letra n600 azulo pi">Remitir Juez de Familia</h3>
   
  <br>
  <h5 class="centrar letra n600 azulo pi">Introduzca Apellido o N&uacute;mero de Documento </h5> 

        <input name="busca"  type="text" id="busqueda">
        <input type="submit" name="Submit" value="buscar" class="btn btn-primary" />
</center>

    
     


<br>
<section class="fblanco">
           <div class="container pu pi">
  <?php 
  include("../../conexion/conexion.php");
  
  $codigo_expediente=$_GET['codigo_expediente'];
  $id_ninnos=$_GET['id_ninnos'];
  
  ?>

<?php
  if(isset($_POST['Submit'])){ ?>                                                                      
              <div class="table-responsive"> 
<table width="1166" border="1" id="tab" style="background:#FFFFFF" align="center" class="table">

   <tr>
          
		  <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
          <td class="col-md-4 control-label letra n600 azulo">Num. Documento</td>
          <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
		  <td class="col-md-4 control-label letra n600 azulo">Teléfono</td>
          <td class="col-md-4 control-label letra n600 azulo" style="display:none">Email</td>
          <td class="col-md-4 control-label letra n600 azulo">Remitir</td>
          </tr>
				<tbody>
	 <?php
$busca="";
$busca=$_POST['busca'];

if($busca!=""){
$busqueda=mysql_query("SELECT * FROM usuarios where id_perfil = 9 and apellidos LIKE '%".$busca."%' OR numero_documento LIKE '%".$busca."%'");//cambiar nombre de la tabla de busqueda
while($row=mysql_fetch_array($busqueda)){
						
                        
          $apellidos=$row['apellidos'];
          $nombres=$row['nombres'];
          $id_tipo_documento=$row['id_tipo_documento'];
		  $numero_documento=$row['numero_documento'];
		  $id_genero=$row['id_genero'];
		  $id_municipio=$row['id_municipio'];
          $telefono=$row['telefono'];
          $usuario=$row['usuario'];
          $clave=$row['clave'];
		  $correo=$row['correo'];
          $id_perfil=$row['id_perfil'];
          $id_entidad=$row['id_entidad'];
		  $estado=$row['estado'];
		  $fecha_registro=$row['fecha_registro'];
		  
    ?>  				
						<tr>
                        
          <td><?php echo $apellidos;?>&nbsp;<?php echo $nombres;?></td>
          <td align="center"><?php echo $numero_documento;?></td>
          <td align="center">
          <?php
		   $busqueda1=mysql_query("SELECT * FROM municipios where id_municipio='$id_municipio'  ");
           while($row1=mysql_fetch_array($busqueda1))
		   { echo $row1['descripcion'];}
		   ?></td>
          <td align="center"><?php echo $telefono; ?></td>
		  <td align="center" style="display:none"><?php echo $correo; ?></td>  
          <td align="center"><h5 class="letra n500  azulo centrar ps linku "><a href="RemitirJuezfamiliaUsuario.php?id_usuario=<?php echo $row['id_usuario'];?>&id_tipo_documento=<?php echo $row['id_tipo_documento']; ?>&id_genero=<?php echo $row['id_genero']; ?>&id_municipio=<?php echo $row['id_municipio']; ?> &id_perfil=<?php echo $row['id_perfil']; ?>&codigo_expediente=<?php echo $codigo_expediente ?>&id_ninnos=<?php echo $id_ninnos ?>" class="linku">Remitir</a></h5></td>
          <?php } }?>
         </tr>



</table>

 <?php 
 }
 else { ?>
	<section class="fblanco">
           <div class="container pu pi">
                                                                        
              <div class="table-responsive"> 
<table width="1166" border="1" id="tab" style="background:#FFFFFF" align="center" class="table">

   <tr>
          <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
          <td class="col-md-4 control-label letra n600 azulo">Num. Documento</td>
          <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
		  <td class="col-md-4 control-label letra n600 azulo">Teléfono</td>
          <td class="col-md-4 control-label letra n600 azulo" style="display:none">Email</td>
          <td class="col-md-4 control-label letra n600 azulo">Remitir </td>
          </tr>
				<tbody>
	 <?php

$busqueda=mysql_query("SELECT * FROM usuarios where id_perfil = 9  order by apellidos ");//cambiar nombre de la tabla de busqueda
while($row=mysql_fetch_array($busqueda)){
						
          $id_usuario=$row['id_usuario'];             
          $apellidos=$row['apellidos'];
          $nombres=$row['nombres'];
          $id_tipo_documento=$row['id_tipo_documento'];
		  $numero_documento=$row['numero_documento'];
		  $id_genero=$row['id_genero'];
		  $id_municipio=$row['id_municipio'];
          $telefono=$row['telefono'];
          $usuario=$row['usuario'];
          $clave=$row['clave'];
		  $correo=$row['correo'];
          $id_perfil=$row['id_perfil'];
          $id_entidad=$row['id_entidad'];
		  $estado=$row['estado'];
		  $fecha_registro=$row['fecha_registro'];
		  
    ?>  				
						<tr>
            
          <td><?php echo $apellidos;?>&nbsp;<?php echo $nombres;?></td>
          <td align="center"><?php echo $numero_documento;?></td>
          <td align="center">
          <?php
		   $busqueda1=mysql_query("SELECT * FROM municipios where id_municipio='$id_municipio'  ");
           while($row1=mysql_fetch_array($busqueda1))
		   { echo $row1['descripcion'];}
		   ?></td>
          <td align="center"><?php echo $telefono; ?></td>
		  <td align="center" style="display:none"><?php echo $correo; ?></td>  
          <td align="center"><h5 class="letra n500  azulo centrar ps linku "><a href="RemitirJuezfamiliaUsuario.php?id_usuario=<?php echo $row['id_usuario'];?>&id_tipo_documento=<?php echo $row['id_tipo_documento']; ?>&id_genero=<?php echo $row['id_genero']; ?>&id_municipio=<?php echo $row['id_municipio']; ?> &id_perfil=<?php echo $row['id_perfil']; ?>&codigo_expediente=<?php echo $codigo_expediente ?>&id_ninnos=<?php echo $id_ninnos ?>" class="linku">Remitir</a></h5></td>
          <?php } }?>
         </tr>
         </table>
</form>   
                          </div>
            </div>
        </section>  
      
                       
        

    </body>
	</html>	
	
