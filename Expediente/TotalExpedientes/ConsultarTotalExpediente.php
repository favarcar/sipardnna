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
    $resultado = mysqli_query($con,$consulta) or die (mysqli_error());
    $fila = mysqli_fetch_array($resultado);
    $nombres = $fila['nombres'];
    $apellido = $fila['apellidos'];
    $id_municipio = $fila['id_municipio'];
 ?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistema de Informaci&oacuten;</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="../TotalExpdientes/apple-touch-icon.png">        
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
        <link rel="stylesheet" type="text/css" href="../TotalExpdientes/engine1/style.css" />
        <script type="text/javascript" src="../TotalExpdientes/engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
    </head>
    
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
        
    <section style="background-color: #BDBDBD;">
        <div class="container ps ">
            <div class="row clearfix centrar">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <h2 class="centrar letra n600 azulo pi">Expedientes</h2>
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
                        <li role="presentation" class="letra n500"><a href="../ExpedientesRemitidos/ConsultarExpedienteRemi.php">Consultar Expedientes Remitidos</a></li>    
                        <li role="presentation" class="letra n500"><a href="../TotalExpedientes/ConsultarTotalExpediente.php">Consultar Total de Expedientes</a></li>
                    </ul>
                    <input type="button" id="refresh"value="Actualizar" onclick="location.reload()"style="display:none"/>
                </div>
            </div>        
        </div>             
    </section>
    
    <body class="fblanco">
        <script language="JavaScript">
            function Borra(idcliente){
                var agree=confirm("¿Realmente desea eliminar el cliente seleccionado?");
                if (agree){
                    document.location="eliminar.php?id="+idcliente;
                } else return false;
            }
                </script>
                
                <form name="form1" method="post" action="ConsultarTotalExpediente.php" id="cdr" >
                    <center>
                        <h3 class="centrar letra n600 azulo pi">Consultar Expediente</h3><br>
                        <h5 class="centrar letra n600 azulo pi">Introduzca Apellido o N&uacute;mero de Documento de Ni&ntilde;o, Ni&ntilde;a o Adolescente</h5>         
                        <input name="busca"  type="text" id="busqueda">
                        <input type="submit" name="Submit" value="buscar" class="btn btn-primary" />
                    </center><br>
                    
                    <section class="fblanco">
                        <div class="container pu pi">
                            
  <?php 
  if(isset($_POST['Submit'])){
      ?>
                <div class="table-responsive"> 
                    <table width="1166" border="1" id="tab" style="background:#FFFFFF" align="center" class="table">
                        <tr>
                            <td colspan="10" class="letra n600 azulo">Total Niños, Niñas o Adolescentes Registrados:  
                                <?php $con4 = mysqli_query($con,"SELECT count(id_ninnos) FROM ninnosnna");
                                while($row4 = mysqli_fetch_array($con4)){
                                    echo $nom_asignatura11 = $row4['count(id_ninnos)'];
                                    } ?>
                            </td>
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
            $busca = "";
            $busca = $_POST['busca'];
            if($busca != ""){
                $busqueda = mysqli_query($con,"SELECT * FROM ninnosnna where Apellidos LIKE '%".$busca."%' OR No_identificacion LIKE '%".$busca."%'");//cambiar nombre de la tabla de busqueda
                while($row = mysqli_fetch_array($busqueda)){              
                    $apellidos = $row['Apellidos'];
                    $nombres = $row['Nombres'];
                    $numero_documento = $row['No_identificacion'];
                    $id_municipio = $row['id_municipio'];
                    $id_provincia = $row['id_provincia'];
                    $edad = $row['Edad'];
                    $id_ninnos = $row['id_ninnos'];
        ?>  
                            <tr>
                                <td><?php echo $apellidos;?>&nbsp;<?php echo $nombres;?></td>
                                <td align="center"><?php echo $numero_documento;?></td>
                                <td align="center">
          <?php 
            $busqueda1 = mysqli_query($con,"SELECT * FROM municipios where id_municipio = '$id_municipio'  ");
            while($row1 = mysqli_fetch_array($busqueda1)){
                echo $row1['descripcion'];
            } ?>
                                </td>
                                <td align="center">
          <?php $busqueda2 = mysqli_query($con,"SELECT * FROM provincias where id_provincia = '$id_provincia' ");
            while($row2 = mysqli_fetch_array($busqueda2)){
                echo $row2['descripcion'];
            } ?>
                                </td>
                                <td align="center">
                                    <?php echo $edad; ?>
                                </td> 
                                    <?php } ?>
                                <td> 
		  <?php  if($id_ninnos == $id_ninnos21){ 
           echo "NO tiene Expediente";
            ?>
			  
			<?php   }
			   else{ ?>
                                    <h5 class="letra n500  azulo centrar ps linku "><a href="ConsultarTotalExpedientesNinos.php?id_ninnos=<?php echo $row['id_ninnos'];?>" class="linku">Consultar</a></h5>
			<?php  } ?>
                                </td>
                        <?php } ?>
                            </tr>
                    </table>
                        <?php } else { ?>
                    <section class="fblanco">
                        <div class="container pu pi">                                           
                            <div class="table-responsive"> 
                                <table width="1166" border="1" id="tab" style="background:#FFFFFF" align="center" class="table">
                                    <tr>
                                        <td colspan="11" class="letra n600 azulo">Total Niños, Niñas o Adolescentes Registrados:  
                                            <?php $con4 = mysqli_query($con,"SELECT count(id_ninnos) FROM ninnosnna");	
                                            while($row4 = mysqli_fetch_array($con4)){
                                                echo $nom_asignatura11 = $row4['count(id_ninnos)']; 
                                                } ?>
                                        </td>
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
	<?php $busqueda = mysqli_query($con,"SELECT * FROM ninnosnna ORDER BY id_ninnos DESC"); //cambiar nombre de la tabla de busqueda
         while($row = mysqli_fetch_array($busqueda)){
             $apellidos = $row['Apellidos'];
             $nombres = $row['Nombres'];
             $numero_documento = $row['No_identificacion'];
             $id_municipio = $row['id_municipio'];
             $id_provincia = $row['id_provincia'];
             $edad = $row['Edad'];
             $id_ninnos = $row['id_ninnos'];
        ?>  				
                                        <tr>
                                            <td><?php echo $apellidos;?>&nbsp;<?php echo $nombres;?></td>
                                            <td align="center"><?php echo $numero_documento;?></td>
                                            <td align="center">
          <?php $busqueda1 = mysqli_query($con,"SELECT * FROM municipios WHERE id_municipio = '$id_municipio' ");
            while($row1 = mysqli_fetch_array($busqueda1)){
                echo $row1['descripcion'];
            } ?>
                                            </td>
                                            <td align="center">
          <?php $busqueda2 = mysqli_query($con,"SELECT * FROM provincias WHERE id_provincia = '$id_provincia' ");
            while($row2 = mysqli_fetch_array($busqueda2)){
                echo $row2['descripcion_prov'];
            } ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $edad;  ?>
                                            </td> 
                                            <td>
                                            <?php 
                                                $id_ninnos21 = "";
                                                $busqueda21 = mysqli_query($con,"SELECT * FROM expediente WHERE id_ninnos = '$id_ninnos' ");
                                                while($row21 = mysqli_fetch_array($busqueda21)){
                                                    $id_ninnos21=$row21['id_ninnos'];            
                                                }		   
                                                if($id_ninnos==$id_ninnos21){
                                            ?>                          
                                                <h5 class="letra n500 azulo centrar ps linku "><a href="ConsultarTotalExpedientesNinos.php?id_ninnos=<?php echo $row['id_ninnos'];?>" class="linku">Consultar</a></h5>	
                                            <?php
                                            } else{
                                                echo "NO tiene Expediente";
                                                } ?>
                                            </td>
                                            <?php } }?>
                                        </tr>
                                </table>
                                </form>   
</div>
                        </div>
                    </section> 
                </body>
                </html>	