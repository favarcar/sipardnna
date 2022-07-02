<!doctype html>
<?php
include("conexion/conexion.php");

?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"> -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
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

    </head>
    <body style="background-color: #64AF59;">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <header class="f4">
            <div class="container">
                <div class="row clearfix ps pi2x">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

                                    
                                    <div  class="letra n700  azulo centrar">
                                      <h2><b>Sistema de Informaci&oacute;n para el Restablecimiento de Derechos de Ni&ntilde;os, Ni&ntilde;as o Adolescentes</b></h2></div>
                    </div>

                </div>


            </div>
        </header>

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <section class="fblanco">
            <div class="container ">

                     <div class="row clearfix ps2x pi">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pi">
                           <h3 class="letra n700  azulo centrar">Recuperar ontrase&ntilde;a </h3>
                           <div align="center"><a class="linku" href="index.html">volver</a></div>

                                <form class="form-horizontal ps2x" id="form1" name="form1" method="post">
                                      <fieldset>

                                      <!-- Form Name -->
                                      

                                      <!-- Text input-->
                                      <div class="form-group">
                                        <label class="col-md-4 control-label letra gris2 n300 letra azulo  tamano2" for="nombre">Ingrese Documento de Identidad:</label> 
                                        <div class="col-md-4">
                                        <input id="numero"  name="numero" type="text" placeholder="" class="form-control input-md" autocomplete="off" required>
                                          
                                        </div>
                                      </div>

                                      <!-- Text input-->
                                      


                                      <!-- Button -->
                                      <div class="form-group linku">
                                        <label class="col-md-4 control-label" for="singlebutton"></label>
                                        <div class="col-md-4">
                                          <button id="singlebutton" name="singlebutton" class="btn btn-lg btn-default letra azulo">Buscar<span class="glyphicon glyphicon-chevron-right"></span></button>
                                        
                                           <?php
include("conexion/conexion.php");
if($_POST){
$resultado = $_POST['numero'];



	$con=mysql_query("SELECT * from usuarios  ");	
	
	while($reg=mysql_fetch_array($con)){
	
	    $numero_documento= $reg['numero_documento'];
		$usu= $reg['usuario'];
		$pas= $reg['clave'];
	
		
	if($numero_documento==$resultado)
	{ 
	?>
   
    <table class="table table-striped table-bordered">
  <tr>
    <td width="130" height="39"><b>Usuario:</b></td>
    <td width="54"><?php echo  $usu;?></td>
  </tr>
  <tr>
    <td height="46"><b>Contras&ntilde;ea:</b></td>
    <td>        <?php echo $pas;
	
	} 
	
	}
	}	
	

?>
</td>
  
</table>

                                        </div>
                                      </div>




                                      </fieldset>
                                  </form>
                        </div>
                   </div>
                        

                            

                 
              </div>        
          </section>


          <footer style="background-color:#64AF59;" class="borde_top">
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
			
			function limpia(elemento)
{
elemento.value = "";
}

function verifica(elemento)
{
if(elemento.value == "")
elemento.value = "Default Value";
}
        </script>
    </body>
</html>


