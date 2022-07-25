<meta charset="utf-8"/>


<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Sistema de Informaci&oacute;</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        
        <link rel="stylesheet" href="../css/bootstrap.css">

        <style>
            body {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        </style>


        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">


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

 <?php
   
include("../conexion/conexion.php");

 echo $id_ninnos=$_GET['id_ninnos'];


?>
<form name="form1" method="post" action="ConsultarExpediente.php" id="cdr" >
  <center>
    <h3 class="centrar letra n600 azulo pi">Consultar Expedientes de Ni&ntilde;os, Ni&ntilde;as o Adolescentes</h3>
    
</center>

    
<section class="fblanco">
    <div class="container pi3x">



	<section class="fblanco">
           <div class="container pu pi">
                                                                        
              <div class="table-responsive"> 
<table class="table table-striped table-bordered">
<tr>
<td colspan="9" class="letra n600 azulo">Total de Expedientes Registrados: <?php 			
		  $con4=mysql_query("SELECT count(id_ninnos) FROM expediente where id_ninnos = '$id_ninnos' ");
			
			while($row4=mysql_fetch_array($con4)){
				echo $nom_asignatura11=$row4['count(id_ninnos)']; 
				}  ?>  </td>
</tr>
<tr>
 <td colspan="9" class="letra n600 azulo" align="center">
 <?php 			
		  $con44=mysql_query("SELECT * FROM ninnosnna where  id_ninnos = '$id_ninnos' ");
			
			while($row44=mysql_fetch_array($con44)){
				$id_ninnos=$row44['id_ninnos'];
				echo $Apellidos44=$row44['Apellidos']; ?>
                &nbsp;
                <?php 
				echo $Nombres44=$row44['Nombres']; 
				  ?>
               
                
                </td>
</tr>

<?php } ?>

   <tr>
           <td class="col-md-4 control-label letra n600 azulo">No. Expediente</td>
          <td class="col-md-4 control-label letra n600 azulo">Fecha de Expediente</td>
          <td class="col-md-4 control-label letra n600 azulo">Nombre Cuidadores </td>
		  <td class="col-md-4 control-label letra n600 azulo">Descripci&oacute;n del Expediente</td>

          <td class="col-md-4 control-label letra n600 azulo">Estado del Expediente</td>
          
          <td class="col-md-4 control-label letra n600 azulo">Consultar</td>
          
       
          
          <td class="col-md-4 control-label letra n600 azulo"> Consultar Remisi&oacute;n </td>
          
           
          
          

				</tr>
				<tbody>
	 <?php

$busqueda=mysql_query("SELECT * FROM expediente where id_ninnos = '$id_ninnos' order by id_ninnos  desc ");//cambiar nombre de la tabla de busqueda
while($row=mysql_fetch_array($busqueda)){
						
	$id_ninnos1=$row['id_ninnos'];
	$codigo_expediente=$row['codigo_expediente'];
	$Fecha_inicio_expediente=$row['Fecha_inicio_expediente'];
	$Descripcion_expediente=$row['Descripcion_expediente'];
	$id_estadocaso=$row['id_estadocaso'];
	
	
		  
    ?>  				
						<tr>
            
          <td align="center"><?php echo $codigo_expediente;?> </td>
          <td align="center"><?php echo $Fecha_inicio_expediente;  ?></td>
          <td align="center">
          <?php
           $busqueda2=mysql_query("SELECT * FROM cuidadores where id_ninos='$id_ninnos'  ");
           while($row2=mysql_fetch_array($busqueda2))
		   {
			    echo $row2['Apellidos'];?>
                &nbsp;
				<?php echo $row2['Nombres'];
		   
		   }
		   ?>
          </td>
           <td align="center"><textarea disabled><?php echo $Descripcion_expediente; ?></textarea></td>
           <td><?php
		      $busqueda2=mysql_query("SELECT * FROM estado_caso where 	id_estadocaso='$id_estadocaso'  ");
           while($row2=mysql_fetch_array($busqueda2))
		   {
			         $row2['id_estadocaso'];
				echo $row2['descripcion'];
                		   
		   }
		   
		   ?></td>
		   <td>
		                
            <h5 class="letra n500  azulo centrar ps linku "><a href="main.php?key=31&codigo_expediente=<?php echo $row['codigo_expediente'];?>&id_ninnos=<?php echo $row['id_ninnos'];?>" class="linku">Consultar</a></h5>
			   
			</td>
            
            <?php
			
           $busqueda21=mysql_query("SELECT * FROM remite where 	codigo_expediente='$codigo_expediente'  ");
           while($row21=mysql_fetch_array($busqueda21))
		   {$codigo_expediente21=$row21['codigo_expediente'];}
		  
           if($codigo_expediente==$codigo_expediente21){
			   echo "Expediente Remitido";
			   }
			   else{
            ?>
           <?php }?>
            
           
            
            <td>
                        <?php
			
           $busqueda21=mysql_query("SELECT * FROM remite where 	codigo_expediente='$codigo_expediente'  ");
           while($row21=mysql_fetch_array($busqueda21))
		   {$codigo_expediente21=$row21['codigo_expediente'];}
		  
           if($codigo_expediente==$codigo_expediente21){ ?>
			   
			   <h5 class="letra n500  azulo centrar ps linku "><a href="main.php?key=30&codigo_expediente=<?php echo $row['codigo_expediente'];?>&id_ninnos=<?php echo $row['id_ninnos'];?>" class="linku">Consultar Remisi&oacute;n</a></h5>
			   <?php
			  
			   }
			   else{
				    echo "Expediente NO Remitido";
             }?>
            
            </td>
           
 
   <?php   }?>
         </tr>
         </table>
</form>   
         
      
                       
        

    </body>
	</html>	
	
