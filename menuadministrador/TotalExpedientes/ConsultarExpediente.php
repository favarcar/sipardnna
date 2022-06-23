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

 $id_ninnos=$_GET['id_ninnos'];

?>

<form name="form1" method="post" action="ConsultarExpediente.php" id="cdr" >
  <center>
    <h3 class="centrar letra n600 azulo pi">Consultar Expediente</h3>
   
  <br>
  <h5 class="centrar letra n600 azulo pi">Introduzca Apellido o N&uacute;mero de Documento de Ni&ntilde;o, Ni&ntilde;a o Adolescentes</h5> 

        <input name="busca"  type="text" id="busqueda">
        <input type="submit" name="Submit" value="buscar" class="btn btn-primary" />
</center>

    
     


<br>
<section class="fblanco">
           <div class="container pu pi">
  <?php 
  
  if(isset($_POST['Submit'])){ ?>                                                                      
              <div class="table-responsive"> 
<table width="1166" border="1" id="tab" style="background:#FFFFFF" align="center" class="table">
<tr>
<td colspan="10" class="letra n600 azulo">Total Niños, Niñas o Adolescentes Registrados:  <?php 			
		  $con4=mysql_query("SELECT count(id_ninnos) FROM ninnosnna");
			
			while($row4=mysql_fetch_array($con4)){
				echo $nom_asignatura11=$row4['count(id_ninnos)']; 
				}  ?>  </td>
</tr>
   <tr>
          
		  <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
          <td class="col-md-4 control-label letra n600 azulo">No. Documento</td>
          <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
		  <td class="col-md-4 control-label letra n600 azulo">Provincia</td>

          <td class="col-md-4 control-label letra n600 azulo">Edad</td>
          
          
            <?php
			
           $busqueda21=mysql_query("SELECT * FROM expediente where 	id_ninnos='$id_ninnos'  ");
           while($row21=mysql_fetch_array($busqueda21))
		   {  $id_ninnos21=$row21['id_ninnos'];}
		   
		  
           if($id_ninnos==$id_ninnos21){
			   "Ya tiene Expediente";
			   }
			   else{
            ?>
          Expediente
                    <td class="col-md-4 control-label letra n600 azulo">Consultar Expedientes</td>
                   

		 
				</tr>
				<tbody>
	 <?php
$busca="";
$busca=$_POST['busca'];

if($busca!=""){
$busqueda=mysql_query("SELECT * FROM ninnosnna where Apellidos LIKE '%".$busca."%' OR No_identificacion LIKE '%".$busca."%' ");//cambiar nombre de la tabla de busqueda
while($row=mysql_fetch_array($busqueda)){
						
                        
          $apellidos=$row['Apellidos'];
          $nombres=$row['Nombres'];
          $numero_documento=$row['No_identificacion'];
		  $id_municipio=$row['id_municipio'];
          $id_provincia=$row['id_provincia'];
          $edad=$row['Edad'];
		  $id_ninnos=$row['id_ninnos'];
          
		  
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
          <td align="center">
          <?php
           $busqueda2=mysql_query("SELECT * FROM provincias where id_provincia='$id_provincia'  ");
           while($row2=mysql_fetch_array($busqueda2))
		   { echo $row2['descripcion'];}
		   ?></td>
		  <td align="center">
          <?php echo $edad;  ?></td>  
           
           <?php } ?>
		   <td> 
		  <?php  if($id_ninnos==$id_ninnos21){ 
           echo "NO tiene Expediente";
            ?>
			  
			<?php   }
			   else{ ?>
				   
				   <h5 class="letra n500  azulo centrar ps linku "><a href="ConsultarExpedientesNinos.php?id_ninnos=<?php echo $row['id_ninnos'];?>" class="linku">Consultar</a></h5>
				    
		<?php  } ?></td>
          

   <?php  } }?>
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
<td colspan="11" class="letra n600 azulo">Total Niños, Niñas o Adolescentes Registrados:  <?php 			
		  $con4=mysql_query("SELECT count(id_ninnos) FROM ninnosnna");
			
			while($row4=mysql_fetch_array($con4)){
				echo $nom_asignatura11=$row4['count(id_ninnos)']; 
				}  ?>  </td>
</tr>
   <tr>
           <td class="col-md-4 control-label letra n600 azulo">Nombre</td>
          <td class="col-md-4 control-label letra n600 azulo">No. Documento</td>
          <td class="col-md-4 control-label letra n600 azulo">Municipio</td>
		  <td class="col-md-4 control-label letra n600 azulo">Provincia</td>

          <td class="col-md-4 control-label letra n600 azulo">Edad</td>
          
       
          
          <td class="col-md-4 control-label letra n600 azulo">Consultar Expedientes</td>
          
          

				</tr>
				<tbody>
	 <?php

$busqueda=mysql_query("SELECT * FROM ninnosnna order by id_ninnos  desc ");//cambiar nombre de la tabla de busqueda
while($row=mysql_fetch_array($busqueda)){
						
         $apellidos=$row['Apellidos'];
          $nombres=$row['Nombres'];
          $numero_documento=$row['No_identificacion'];
		  $id_municipio=$row['id_municipio'];
          $id_provincia=$row['id_provincia'];
          $edad=$row['Edad'];
		$id_ninnos=$row['id_ninnos'];
		  	
		  
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
           <td align="center">
          <?php
           $busqueda2=mysql_query("SELECT * FROM provincias where id_provincia='$id_provincia'  ");
           while($row2=mysql_fetch_array($busqueda2))
		   { echo $row2['descripcion'];}
		   ?></td>
		  <td align="center">
          <?php echo $edad;  ?></td>   
          <?php
			
           $busqueda21=mysql_query("SELECT * FROM expediente where 	id_ninnos='$id_ninnos'  ");
           while($row21=mysql_fetch_array($busqueda21))
		   {$id_ninnos21=$row21['id_ninnos'];}
		  
           if($id_ninnos==$id_ninnos21){
			   "Ya tiene Expediente";
			   }
			   else{
            ?>
            <?php }?>
           
		   <td>
		    <?php if($id_ninnos==$id_ninnos21){ ?>
                      
 <h5 class="letra n500  azulo centrar ps linku "><a href="ConsultarExpedientesNinos.php?id_ninnos=<?php echo $row['id_ninnos'];?>" class="linku">Consultar</a></h5>
			
           
			<?php    
			    }
			 
			   else{ 
 echo "NO tiene Expediente";
 } ?></td>
 
   <?php  } }?>
         </tr>
         </table>
</form>   
                          </div>
            </div>
        </section>  
      
                       
        

    </body>
	</html>	
	
