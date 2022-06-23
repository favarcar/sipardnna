<?php
//Proceso de conexión con la base de datos
	   include("../conexion/conexion.php");
	    

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

$consulta= "SELECT * FROM usuarios where numero_documento='$id_usuario' "; 
$resultado= mysqli_query($con,$consulta) or die (mysqli_error());
$fila=mysqli_fetch_array($resultado);
$nombres = $fila['nombres'];
$apellido = $fila['apellidos'];
$id_municipio= $fila['id_municipio'];


 
					   $busqueda1=mysqli_query($con,"SELECT * FROM municipios where id_municipio='$id_municipio' ");
                        while($row1=mysqli_fetch_array($busqueda1)){
		  
		                  $id_municipio1=$row1['id_municipio'];		
                          $des_municipio=$row1['descripcion'];             
						}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistema de Informaci&oacute;n</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="img/logo-ggg.jpg">
      
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

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
         <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
        <script type="text/javascript" src="engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
<script>     
function autofitIframea(id){
if (!window.opera && document.all && document.getElementById){
id.style.height=id.contentWindow.document.body.scrollHeight;
} else if(document.getElementById) {
id.style.height=id.contentDocument.body.scrollHeight+"px";
}
}
</script>
    </head>
    <body style="background-color: #64AF59;">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<header style="background-color: #64AF59;">
 
 <div class="text-center" style="height:30px; color:white; background-color:"><strong>Sistema de Información para el Restablecimiento de Derechos de Niños, Niñas y Adolescentes</strong></div>
 <nav class="navbar navbar-default">
  <div class="container-fluid mt-5">
    <div class="navbar-header">
	      <a  href="#" style="border:1px"><img class="img-fluid" height="50px" src="../img/logo_menu.jpg"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../MenuEnlaceMunicipal.php">Inicio</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultar
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="MenuEnlaceMunicipal/MenuNinosNinasAdo.php">Niños niñas o adolescentes</a></li>
          <li><a href="#">Madres padres o cuidadores</a></li>
          <li><a href="#">Expedientes</a></li>
        </ul>
      </li>
	  <li><a href="#">Mi usuario</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right center-block">
      <li><i class="glyphicon glyphicon-user"></i><strong>Usuario:</strong> <?php echo $nombres?>&nbsp;<?php echo $apellido?>
	  <br>
	  <i class="glyphicon glyphicon-flag"></i>
	  <strong>Municipio:</strong><?= $des_municipio ?> </li>
      <li><a href="desconectar_usuario.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
  </div>
</nav>
 
     </header>
          
<iframe name="usuario" src="../MenuAdministrador/ConsultarNNA.php" width="100%"   height="0" frameborder="0" transparency="transparency" onload="autofitIframea(this);" scrolling="no"></iframe>
      
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>

<footer class="f4 borde_top">
            <div class="container">
                           <div class="row clearfix pi2x ps"> 
                             <div >         
                           <img class="img-responsive  center-block  borde_blanco " src="../img/logo_integracion_social.png" width="60%" alt=""/>
                            </div>     
                       <div  align="center">             
              Sistema de Informaci&oacute;n a&ntilde;o 2022, Versi&oacute;n 3.0</b>    
                     </div>                 
                 </div>
            </div>
    </footer>      
 

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>





