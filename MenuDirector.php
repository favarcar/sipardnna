
<?php
//Proceso de conexión con la base de datos
	   include("conexion/conexion.php");
	    

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
$id_municipio = $fila['id_municipio'];

date_default_timezone_set('UTC');
// Una forma de expresar la fecha 
$fecha = strftime( "%Y-%m-%d", time() ); 

?>



<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistema de informacion </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="img/logo-ggg.jpg">
        
        <link rel="stylesheet" href="css/bootstrap.css">

        <style>
            body {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        </style>


        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">


        <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,600italic' rel='stylesheet' type='text/css'>

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
         <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
        <script type="text/javascript" src="engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
<script language="JavaScript">
//Ajusta el tamaño de un iframe al de su contenido interior para evitar scroll
function autofitIframe(id){
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
            <div class="container">
                <div class="row clearfix ps pi2x">
                    <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
<br>
 <div align="center" class="letra n700  azulo centrar">
   <h1><b>Sistema de Informaci&oacute;n para el Restablecimiento de Derechos de Ni&ntilde;os, Ni&ntilde;as y Adolescentes</b></h1></div>
                   </div>        
                 
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 ps pi">
                   
                  </div>

                   <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 ps pi linku">
                     <h3 class="centrar letra azulo n400"><strong>Bienvenido Director</strong></h3>
                       <h4 class="centrar letra azulo n500"><b>Municipio:</b> <?php 
					   $busqueda1=mysqli_query($con,"SELECT * FROM municipios where id_municipio='$id_municipio' ");
                        while($row1=mysqli_fetch_array($busqueda1)){
		  
		                  $id_municipio1=$row1['id_municipio'];		
                          $des_municipio=$row1['descripcion'];             
	  
} echo  $des_municipio ?></h4>
					   <h4 class="centrar letra azulo n500"><?php echo $nombres?>&nbsp;<?php echo $apellido?></h4>
                       <h4 class="centrar letra azulo n500"><a href="desconectar_usuario.php"><b>Cerrar Sesión</b></a> </h4>

                   
                      </div>
                 </div>
             </div>
     </header>
 

<section class="fblanco" style="background-image: url(img/SIPARDNNA.png);
	background-position: center;
	background-repeat: no-repeat;
	background-attachment:fixed;">
           <div class="container">


                             <div class="row clearfix ps2x pi">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                   <h1 class="centrar letra n600 azulo pi">Menú Principal</h1>
                                </div>
                             </div>


                            <div class="row clearfix ps pi">
                              <div class="col-md-3 col-sm-3 ps pi">
                                 <a href="MenuDirector/MenuNinosNinasAdo.php"><img src="iconos/ninos.png" alt="..." width="150" height="150" class="center-block"></a>
                               <h4 class="centrar letra azulo n400 ps"><strong>Consultar Ni&ntilde;os, Ni&ntilde;as o Adolescentes</strong></h4>
                              </div>
                                
                                <div class="col-md-3 col-sm-3 ps pi">
                                 <a href="MenuDirector/MenuMPC.php"><img src="iconos/padres.png" alt="..." width="150" height="150" class="center-block"></a>
                               <h4 class="centrar letra azulo n400 ps"><strong>Consultar Madres, Padres o Cuidadores</strong></h4>
                                </div>


                               

                                <div class="col-md-3 col-sm-3 ps pi">
                                    <a href="MenuDirector/MenuExpediente.php"><img src="iconos/expe.png" alt="..." width="150" height="150" class="center-block"></a>
                                    <h4 class="centrar letra azulo n400 ps"><strong>Consultar Expedientes </strong></h4>
                                </div>
                                
                                <div class="col-md-3 col-sm-3 ps pi">
                                    <a href="MenuDirector/MenuMiUsuario.php"><img src="iconos/usuario.png" alt="..." width="150" height="150" class="center-block"></a>
                                    <h4 class="centrar letra azulo n400 ps"><strong>Mi Usuario</strong></h4>
                                </div>  
                              
                                
                                
                               
             </div>  



                             <div class="row clearfix ps pi"></div>  



                             <div class="row clearfix ps pi2x"></div>                        
          </div>        
    </section>



<footer class="f4 borde_top">
                        <div class="container">
                           <div class="row clearfix pi2x ps"> 
                            <div >        
                                <img class="img-responsive  center-block  borde_blanco " src="img/logo_integracion_social.png" width="60%" alt=""/>
                      </div>
                      
                       <div  align="center">             
              <b>GOBERNACI&Oacute;N DE BOYAC&Aacute; <br> SECRETAR&Iacute;A DE INTEGRACI&Oacute;N SOCIAL <br> Sistema de Informaci&oacute;n a&ntilde;o 2021, Versi&oacute;n 2.0</b>    
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





