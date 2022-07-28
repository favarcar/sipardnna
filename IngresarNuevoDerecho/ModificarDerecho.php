<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Menú Principal dos</title>
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
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <?php

 //$id_derecho=$_GET['id_derecho'];
			
	
	$busqueda_derechos = mysqli_query($con, "SELECT * FROM derechos WHERE id_derecho='$id_derecho' ");
while($row=mysqli_fetch_array($busqueda_derechos)){		
          $id_derecho=$row['id_derecho'];
		  $descripcion=$row['descripcion_derechos'];
		      
          	  
}
?>


    <section class="fblanco">
    <div class="container pi3x">

          <form class="form-horizontal ps2x"  method="post" enctype="multipart/form-data" >
                <fieldset>

                <!-- Form Name -->
                 <h3 class="centrar letra n600 azulo pi">Modificar Derecho</h3>
                 <!-- Appended checkbox --><!-- Appended checkbox --><!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombre</label>
                  <div class="col-md-4">
                  <input id="textinput" name="descripcion1" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" value="<?php echo $descripcion; ?>" >
                    
                  </div>
                </div>
                
                                               

                <!-- Text input-->
                
                
               
                <div class="form-group">
                  <label class="col-md-4 control-label" for="singlebutton"></label>
                  <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary" >Actualizar</button>
                  </div>
                </div>

                </fieldset>
                </form>
 <?php
if($_POST){ //si se ha presionado enviar


   $descripcion1=$_POST['descripcion1'];
   
   

 mysqli_query($con,"UPDATE `derechos` SET `id_derecho`='$id_derecho',`descripcion`='$descripcion1' WHERE id_derecho='$id_derecho'");
 
 mysqli_close($con);
	

	echo '<script language = javascript>
alert("la Informacion ha sido Guardada Correctamente")
self.location = "ConsultarDerecho.php"
</script>'; 
	

	

	}
?>
     </div>        
</section>











 


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
        
</form>


    </body>
</html>
