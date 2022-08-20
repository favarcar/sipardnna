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
                            </div>
                        </div>
                    </section> 
                    
                </body>
                </html>
