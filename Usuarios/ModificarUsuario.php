<?php

date_default_timezone_set('UTC');
// Una forma de expresar la fecha 
//los demas valores de usuario se toman de main.php

///Consultar la tabla usuarios

$busqueUsuario = mysqli_query($con, "SELECT * FROM usuarios WHERE numero_documento = '$id_usuario' ");//cambiar nombre de la tabla de busqueda
while($row = mysqli_fetch_array($busqueUsuario)){			
    $id_usuario1        = $row['id_usuario'];        
    $apellidos          = $row['apellidos'];
    $nombres            = $row['nombres'];
    $id_tipo_documento  = $row['id_tipo_documento'];
    $numero_documento   = $row['numero_documento'];
    $id_genero          = $row['id_genero'];
    $id_municipio       = $row['id_municipio'];
    $telefono           = $row['telefono'];
    $usuario            = $row['usuario']; 
    $clave              = $row['clave'];
    $clave2              = $row['clave'];
    $correo             = $row['correo'];
    $id_perfil          = $row['id_perfil'];
    $id_entidad         = $row['id_entidad'];
    $estado             = $row['estado'];
    $fecha_registro     = $row['fecha_registro'];
}
//consulta el nombre del municipio
$muni = mysqli_query($con,"SELECT * FROM municipios WHERE id_municipio = '15001' ");
        while($row2=mysqli_fetch_array($muni)){                              
        $id_municipio1=$row2['id_municipio'];
        $des_municipio=$row2['descripcion'];  
            }
$con2 = mysqli_query($con,"SELECT * FROM municipios WHERE id_departamento = '15'");
  $reg2 = mysqli_fetch_array($con2);

?>
 <body style="background-color: #64AF59;">
    <?php 
        date_default_timezone_set('America/Bogota');
        $time = time();
        $fecha=  date("Y-m-d", $time); 
    ?>

  <section class="fblanco" >
    <div class="container pi3x">
    <h3 class="centrar letra n600 azulo pi">Usuario</h3>        
        <form class="form-horizontal num-columnas2 ps2x" method="post" enctype="multipart/form-data">
            <fieldset>

                <!-- Form Name -->


                <!-- Appended checkbox --><!-- Text input-->
                <div class="form-group" style="display:none">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">id_usuario</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="id_usu" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $id_usuario1; ?>"readonly>
                    </div>
                </div>           
                
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="nom_usu" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo  $nombres; ?>"readonly>                    
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="ape_usu" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" value="<?php echo  $apellidos; ?>"readonly>                 
                    </div>
                </div>
                <!-- Multiple Radios (inline) -->
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label> 
                    <div class="col-md-8">
                        <div class="input-group">
                            <select name="tip_doc_usu" id="tip_doc_usu" disabled>
                            <?php
                                $busqueda1 = mysqli_query($con,"SELECT * FROM tipos_documentos WHERE id_tipo_documento = '$id_tipo_documento'");
                                while($row1 = mysqli_fetch_array($busqueda1)){        
                                    $id_tipo_documento = $row1['id_tipo_documento'];
                                    $descripcion = $row1['descripcion'];             
                                }
                             ?>
                                <option value="<?php echo $id_tipo_documento ?>"><?php echo $descripcion ?></option>
                                <?php
                                    $con1 = mysqli_query($con,"SELECT * FROM tipos_documentos");
                                    $reg = mysqli_fetch_array($con1);
                                    do {
                                        $id = $reg['id_tipo_documento'];
                                        $des = $reg['descripcion'];
                                ?>
                                <option value="<?php echo $id;?>" ><?php echo $des;?> </option>
                                <?php
                                    }
                                    while($reg = mysqli_fetch_array($con1));
                                ?>      
                            </select>                            
                        </div>
                    </div>
                </div>                
                
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">No. Documento </label>                 
                    <div class="col-md-8">
                        <input id="textinput" name="num_doc_usu" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $numero_documento; ?>"readonly>                   
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Género</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <select name="genero_usu" id="genero_usu" disabled> 
                            <?php
                                $busqueda1 = mysqli_query($con,"SELECT * FROM generos WHERE id_genero = '$id_genero' ");
                                while($row1=mysqli_fetch_array($busqueda1)){
                                    $id_genero=$row1['id_genero'];		
                                    $descripcion=$row1['descripcion'];             	  
                                }
                            ?>
                                <option value="<?php echo $id_genero ?>"readonly><?php echo $descripcion ?></option>
                                <?php 
                                    $con10 = mysqli_query($con,"SELECT * FROM generos");
                                    $reg = mysqli_fetch_array($con10);
                                    do {
                                        $id_usu = $reg['id_genero'];
                                        $des_usu = $reg['descripcion'];
                                ?>
                                <option value="<?php echo $id_usu;?>" ><?php echo $des_usu;?> </option>
                                <?php 
                                    } 
                                    while($reg=mysqli_fetch_array($con10));
                                ?>        
                            </select>
                        </div>
                    </div>
                 </div>
                    <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <select name="municipio_usu" id="municipio_usu" disabled>
                             <option value="<?php echo $id_municipio1; ?>"><?php echo $des_municipio; ?></option>
                                <?php 
                                    
                                    do {
                                        $id_mun = $reg2['id_municipio'];
                                        $des_mun = $reg2['descripcion'];
                                ?>
                                <option value="<?php echo $id_mun;?>" ><?php echo $des_mun;?> </option>
                                <?php
                                    }
                                    while($reg2 = mysqli_fetch_array($con2));
                                ?>      
                            </select> 
                        </div>
                    </div>
                </div> 

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono</label>
                    <div class="col-md-8">
                        <input id="textinput" name="tel_usu" type="tel" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required value="<?php echo $telefono?>"readonly>                  
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="email_usu" type="email" placeholder="" class="form-control input-md" required value="<?php echo $correo ?>"readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Usuario</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="usuario_usu" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $usuario ?>"readonly>  
                    </div>
                </div>                                     
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Tipo de perfil</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="id_entidad" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $id_entidad ?>"readonly>                      
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Contraseña</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="clave" type="password" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $clave ?>">                      
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Contraseña</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="clave2" type="password" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $clave2 ?>">                      
                    </div>
                </div>
                                </div>
                                <!--Actualizar informacion en la tabla usuarios excepto el nivel 3-->
                                <?php if($nuser == 1 || $nuser == 2){?>

                                <div class="form-group <?= $visiblemod ?>" >
                        <label class="col-md-8 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary" >Actualizar</button><br><br>
                        </div>
                        <?php } ?>                                                 
           
        </form>
    </div>    
   </div> <br>

                <div class="form-group" style="display:none">
                    <label class="col-md-4 control-label letra n600 azulo" for="radios">Autorizar Acceso<span class="centrar letra n600 azulo pi"></span></label>
                    <div class="col-md-8"> 
                        <label class="radio-inline" for="radios-0">
                            <input <?php if($estado=="1"){echo "checked";} ?> value="1" type="radio" name="estado"/>Autorizado 
                        </label> 
                        <label class="radio-inline" for="radios-1">      
                            <input <?php if($estado=="0"){echo "checked";} ?> value="0" type="radio" name="estado"/>Denegado     
                        </label>                  
                    </div>
                </div>  
                               
                </fieldset>                

    <?php 
        if($_POST){ //si se ha presionado enviar
            $id_usu=$_POST['id_usu'];
            $nom_usu=$_POST['nom_usu'];
            $ape_usu=$_POST['ape_usu'];
            $num_doc_usu=$_POST['num_doc_usu'];
            $tip_doc_usu=$_POST['tip_doc_usu'];  
            $genero_usu=$_POST['genero_usu'];
            $municipio_usu=$_POST['municipio_usu'];
            $cargo_usu=$_POST['cargo_usu'];
            $tel_usu=$_POST['tel_usu'];
            $email_usu=$_POST['email_usu'];
            $usuario_usu=$_POST['usuario_usu'];

            if ($clave == "clave" || $clave2 == "clave2"){
                continue;
           }
           $clave = md5($_POST['clave']);
           $clave2 = md5($_POST['clave2']);
           if($clave != $clave2){
            exit('<div class="alert alert-danger">No coiciden las contraseñas</div>');
        }

            $id_entidad=$_POST['id_entidad'];
            $estado=$_POST['estado'];
            $fecha_ing =$_POST['fecha'];
            


            mysqli_query($con,"UPDATE `usuarios` SET 
                clave='$clave'
                WHERE numero_documento='$id_usuario'");

            mysqli_close($con);
        echo '<script language = javascript>
            alert("la Informacion ha sido Guardada Correctamente")
            self.location = "main.php?key=4"
            </script>'; 
        }
    ?>
          <!-- Configuracion para que el pie de pagina no quede tan arriba-->
  <div class="container" style="padding-top: 8%;"></div>

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
 </body>