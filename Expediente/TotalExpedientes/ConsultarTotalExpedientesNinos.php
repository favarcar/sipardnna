<meta charset="utf-8"/>


<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Sistema de Informaci&oacute;n</title>
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
       
 <?php  
    include("../../conexion/conexion.php");

    //$id_ninnos=$_GET['id_ninnos'];
    //Iniciar Sesión
    session_start();

    //Validar si se está ingresando con sesión correctamente
    if (!$_SESSION){
        echo '<script language = javascript>
            alert("usuario no autenticado")
            self.location = "index.html"
            </script>';
    }

    $id_usuario = $_SESSION['numero_documento'];
    $consulta = "SELECT * FROM usuarios where numero_documento = '$id_usuario' "; 
    $resultado = mysqli_query($con,$consulta) or die (mysqli_error($con));
    $fila = mysqli_fetch_array($resultado);
    $nombres = $fila['nombres'];
    $apellido = $fila['apellidos'];
    $id_municipio = $fila['id_municipio'];
 ?>
<header style="background-color: #64AF59;">
        <div class="container">
            <div class="row clearfix ps pi2x">
                <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6"> <br>
                    <div align="center" class="letra n700  azulo centrar">
                        <h1><b>Sistema de Informaci&oacute;n para el Restablecimiento de Derechos de Ni&ntilde;os, Ni&ntilde;as o Adolescentes</b></h1></div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 ps pi"></div>
                
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 ps pi linku">
                    <h3 class="centrar letra azulo n400"><strong>Bienvenido Comisar&iacute;a de Familia</strong></h3>
                    <h4 class="centrar letra azulo n500"><b>Municipio:</b> 
                        <?php $busqueda1 = mysqli_query($con,"SELECT * FROM municipios where id_municipio = '$id_municipio' ");
                        while($row1 = mysqli_fetch_array($busqueda1)){
                            $id_municipio1 = $row1['id_municipio'];		
                            $des_municipio = $row1['descripcion'];             
                        } echo $des_municipio ?></h4>
                    <h4 class="centrar letra azulo n500"><?php echo $nombres?>&nbsp;<?php echo $apellido?></h4>
                    <h4 class="centrar letra azulo n500"><a href="desconectar_usuario.php"><b>Cerrar Sesión</b></a> </h4> 
                </div>
            </div>
        </div>
    </header>
 
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
   
include("../../conexion/conexion.php");

 $id_ninnos=$_GET['id_ninnos'];

?>
<!--<form name="form1" method="post" action="ConsultarExpediente.php" id="cdr" 
  <center>
    <h3 class="centrar letra n600 azulo pi">Consultar Expedientes de Ni&ntilde;os, Ni&ntilde;as o Adolescentes</h3>-->
    
</center>
    
    <section style="background-color: #BDBDBD;">
        <div class="container ps ">
            <div class="row clearfix centrar">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <h2 class="centrar letra n600 azulo pi">Consultar Expedientes de Ni&ntilde;os, Ni&ntilde;as o Adolescentes</h2>
                </div>
            </div>        
        </div>        
    </section>
    
    <section class="fblanco">
        <div class="container ps2x ">
            <div class="row clearfix centrar">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">                  
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="letra n500"><a href="../../MenuComisariaFamilia.php">Volver Men&uacute; Principal</a></li>
                        <li role="presentation" class="letra n500"><a id="consultaBtn"href="../../MenuExpediente.php" >Consultar Expedientes</a></li>
                        <li role="presentation" class="letra n500"><a href="../../Expediente/ExpedientesRemitidos/ConsultarExpedienteRemi.php">Registrar Expedientes</a></li>    
                        <li role="presentation" class="letra n500"><a href="../../Expediente/TotalExpedientes/ConsultarTotalExpediente.php">Consultar Total de Expedientes</a></li>
                    </ul>
                    <input type="button" id="refresh"value="Actualizar" onclick="location.reload()"style="display:none"/>
                </div>
            </div>        
        </div>             
    </section>

    
<section class="fblanco">
    <div class="container pi3x">



	<section class="fblanco">
           <div class="container pu pi">
                                                                        
              <div class="table-responsive"> 
<table class="table table-striped table-bordered">
<tr>
<td colspan="9" class="letra n600 azulo">Total de Expedientes Registrados: <?php 			
		  $con4=mysqli_query($con,"SELECT count(id_ninnos) FROM expediente where id_ninnos = '$id_ninnos' ");
			
			while($row4=mysqli_fetch_array($con4)){
				echo $nom_asignatura11=$row4['count(id_ninnos)']; 
				}  ?>  </td>
</tr>
<tr>
 <td colspan="9" class="letra n600 azulo" align="center">
 <?php 			
		  $con44=mysqli_query($con,"SELECT * FROM ninnosnna where id_ninnos = '$id_ninnos' ");
			
			while($row44=mysqli_fetch_array($con44)){
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
          
          <td class="col-md-4 control-label letra n600 azulo">Consultar Expediente</td>
          
                   
          <td class="col-md-4 control-label letra n600 azulo"> Consultar Remisi&oacute;n </td>
          
           
          

				</tr>
				<tbody>
	 <?php

$busqueda=mysqli_query($con,"SELECT * FROM expediente where id_ninnos = '$id_ninnos' order by id_ninnos  desc ");//cambiar nombre de la tabla de busqueda
while($row=mysqli_fetch_array($busqueda)){
						
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
           $busqueda2=mysqli_query($con,"SELECT Apellidos_cuidadores, Nombres_cuidadores FROM cuidadores where id_ninos='$id_ninnos1'  ");
           while($row2=mysqli_fetch_array($busqueda2))
		   {
			    echo $row2['Apellidos_cuidadores'];?>
                &nbsp;
				<?php echo $row2['Nombres_cuidadores'];
		   
		   }
		   ?>
          </td>
           <td align="center"><textarea><?php echo $Descripcion_expediente; ?></textarea></td>
           <td><?php
		      $busqueda2=mysqli_query($con,"SELECT * FROM estado_caso where 	id_estadocaso='$id_estadocaso'  ");
           while($row2=mysqli_fetch_array($busqueda2))
		   {
			         $row2['id_estadocaso'];
				echo $row2['descripcion_estado_caso'];
                		   
		   }
		   
		   ?></td>
		   <td>
		      <!--h5 class="letra n500  azulo centrar ps linku "><a href="ModificarTotalExpediente.php?codigo_expediente=<?php echo $row['codigo_expediente'];?>&id_ninnos=<?php echo $row['id_ninnos'];?>" class="linku">Consultar</a></h5-->           
            <h5 class="letra n500  azulo centrar ps linku "><a href="../ModificarExpedienteNoti.php?codigo_expediente=<?php echo $row['codigo_expediente'];?>&id_ninnos=<?php echo $row['id_ninnos'];?>" class="linku">Consultar</a></h5>
			   
			</td>
           
            
            <td>
                        <?php
			$codigo_expediente21="";
           $busqueda21=mysqli_query($con,"SELECT * FROM remite where 	codigo_expediente='$codigo_expediente'  ");
           while($row21=mysqli_fetch_array($busqueda21))
		   {$codigo_expediente21=$row21['codigo_expediente'];}
		  
           if($codigo_expediente==$codigo_expediente21){ ?>
			   
			   <h5 class="letra n500  azulo centrar ps linku "><a href="ConsultarTotalRemicion.php?codigo_expediente=<?php echo $row['codigo_expediente'];?>&id_ninnos=<?php echo $row['id_ninnos'];?>" class="linku">Consultar Remisi&oacute;n</a></h5>
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
	
