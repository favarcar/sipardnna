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
   



//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.html"
</script>';
}

$id_usuario = $_SESSION['numero_documento'];

$consulta= "SELECT * FROM usuarios where numero_documento='$id_usuario' "; 
$resultado= mysqli_query($con,$consulta) or die (mysql_error());
$fila=mysqli_fetch_array($resultado);
$nombres = $fila['nombres'];
$apellido = $fila['apellidos'];



?>
<form name="form1" method="post" action="ConsultarDerecho.php" id="cdr" >
  <center>
    <h3 class="centrar letra n600 azulo pi">Consultar Derechos</h3>
   
  <br>
  <h5 class="centrar letra n600 azulo pi">Introduzca Nombre del Derecho </h5> 

        <input name="busca"  type="text" id="busqueda">
        <input type="submit" name="Submit" value="buscar" class="btn btn-primary" />
        
        <h5 class="letra n500   centrar ps  "><a href="main.php?key=21" class=" btn btn-primary" >Ingresar Nuevo Derecho </a></h5>
</center>

    
     


<br>
<section class="fblanco">
           <div class="container pu pi">
  <?php 
  
  if(isset($_POST['Submit'])){ ?>                                                                      
              <div class="table-responsive"> 
<table class="table table-striped table-bordered">
<tr>
<td colspan="10" class="letra n600 azulo">Total de Derechos Registrados: <?php 			
		  $con4=mysqli_query($con,"SELECT count(id_derecho) FROM derechos");
			
			while($row4=mysqli_fetch_array($con4)){
				echo $id_derecho1=$row4['count(id_derecho)']; 
				}  ?>  </td>
</tr>
   <tr>
          
		  <td class="col-md-4 control-label letra n600 azulo">No. </td>
          <td class="col-md-4 control-label letra n600 azulo">Descripci&oacute;n</td>
           <td class="col-md-4 control-label letra n600 azulo">Editar</td>
            <td class="col-md-4 control-label letra n600 azulo">Eliminar</td>
          
		 
				</tr>
				<tbody>
	 <?php
$busca="";
$busca=$_POST['busca'];

if($busca!=""){
$busqueda=mysqli_query($con,"SELECT * FROM derechos where descripcion LIKE '%".$busca."%' ");//cambiar nombre de la tabla de busqueda
while($row=mysqli_fetch_array($busqueda)){
						
                        
          $id_derecho=$row['id_derecho'];
          $descripcion=$row['descripcion_derechos'];
         		  
    ?>  				
						<tr>
                        
          <td align="center"><?php echo $id_derecho;?></td>
          <td align="center"><?php echo $descripcion;?></td>
           <td align="center"><h5 class="letra n500  azulo centrar ps linku "><a href="main.php?key=22" id_derecho=<?php echo $row['id_derecho'];?> class="linku">Editar</a></h5></td>
            <td align="center"><h5 class="letra n500  azulo centrar ps linku "><a href="EliminarDerecho.php?id_derecho=<?php echo $row['id_derecho'];?>" class="linku">Eliminar</a></h5></td>

   <?php } }?>
         </tr>



</table>

 <?php 
 }
 else { ?>
	<section class="fblanco">
           <div class="container pu pi">
                                                                        
              <div class="table-responsive"> 
<table class="table table-striped table-bordered">
<tr>
<td colspan="11" class="letra n600 azulo">Total Usuarios Registrados: <?php 			
		  $con4=mysqli_query($con,"SELECT count(id_derecho) FROM derechos");
			
			while($row4=mysqli_fetch_array($con4)){
				echo $id_derecho1=$row4['count(id_derecho)']; 
				}  ?>  </td>
</tr>
   <tr>
          <td class="col-md-4 control-label letra n600 azulo">No. </td>
          <td class="col-md-4 control-label letra n600 azulo">Descripci&oacute;n</td>
           <td class="col-md-4 control-label letra n600 azulo">Consultar/Editar</td>
            <td class="col-md-4 control-label letra n600 azulo">Eliminar</td>
          
				</tr>
				<tbody>
	 <?php

$busqueda=mysqli_query($con,"SELECT * FROM derechos order by id_derecho ");//cambiar nombre de la tabla de busqueda
while($row=mysqli_fetch_array($busqueda)){
						
         $id_derecho=$row['id_derecho'];
          $descripcion=$row['descripcion_derechos'];
		  
    ?>  				
						<tr>
            
          <td align="center"><?php echo $id_derecho;?></td>
          <td align="center"><?php echo $descripcion;?></td>
          <td align="center"><h5 class="letra n500  azulo centrar ps linku "><a href="main.php?key=22" id_derecho=<?php echo $row['id_derecho'];?> class="linku">Editar</a></h5></td>
            <td align="center"><h5 class="letra n500  azulo centrar ps linku "><a href="EliminarDerecho.php?id_derecho=<?php echo $row['id_derecho'];?>" class="linku">Eliminar</a></h5></td>
   <?php } }?>
         </tr>
         </table>
        </form>   
        <div class="clearfix"></div>
    </section>



    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = '//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>




    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!-- Datatables -->
    <script src="css/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="css/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="css/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="css/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="css/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="css/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="css/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="css/datatables.net-scroller/js/dataTables.scroller.min.js"></script>


    <!-- PNotify -->
    <script src="css/pnotify/dist/pnotify.js"></script>
    <script src="css/pnotify/dist/pnotify.buttons.js"></script>
    <script src="css/pnotify/dist/pnotify.nonblock.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ui-pnotify').remove();
        });
    </script>

    <script src="js/jsAddExpediente.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = '//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');

        function numeros(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " 0123456789";
            especiales = [8, 37, 39, 46];

            tecla_especial = false
            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if (letras.indexOf(tecla) == -1 && !tecla_especial)
                return false;
        }
    </script>

<div class="clearfix"></div>
    </section>



    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = '//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>




    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!-- Datatables -->
    <script src="css/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="css/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="css/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="css/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="css/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="css/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="css/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="css/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="css/datatables.net-scroller/js/dataTables.scroller.min.js"></script>


    <!-- PNotify -->
    <script src="css/pnotify/dist/pnotify.js"></script>
    <script src="css/pnotify/dist/pnotify.buttons.js"></script>
    <script src="css/pnotify/dist/pnotify.nonblock.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ui-pnotify').remove();
        });
    </script>

    <script src="js/jsAddExpediente.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = '//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');

        function numeros(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " 0123456789";
            especiales = [8, 37, 39, 46];

            tecla_especial = false
            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if (letras.indexOf(tecla) == -1 && !tecla_especial)
                return false;
        }
    </script>

        </section>  
      
                       
        

    </body>
	</html>	
	
