

<?php


//Modificar los usuarios desde el nivel 1

//Traer los datos del usuario requerido
$id_usuario = $_GET ['id_usuario'];
$busqueUsuario = mysqli_query($con, "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario' ");//cambiar nombre de la tabla de busqueda
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
    $correo             = $row['correo'];
    $id_perfil          = $row['id_perfil'];
    $id_entidad         = $row['id_entidad'];
    $estado             = $row['estado'];
    $fecha_registro     = $row['fecha_registro'];
}
//consulta el nombre del municipio
$muni = mysqli_query($con,"SELECT * FROM municipios");
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
                        <input id="textinput" name="nombres" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo  $nombres; ?>">                    
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="apellidos" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" value="<?php echo  $apellidos; ?>">                 
                    </div>
                </div>
                <!-- Multiple Radios (inline) -->
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label> 
                    <div class="col-md-8">
                        <div class="input-group">
                            <select name="id_tipo_documento" id="id_tipo_documento" disabled>
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
                        <input id="textinput" name="numero_documento" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" value="<?php echo $numero_documento; ?>">                   
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Genero</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <select name="id_genero" id="id_genero"> 
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
                            <select name="id_municipio" id="id_municipio" >
                            <?php
                                $busqueda1 = mysqli_query($con,"SELECT * FROM municipios WHERE id_municipio = '$id_municipio' ");
                                while($row1=mysqli_fetch_array($busqueda1)){
                                    $id_municipio=$row1['id_municipio'];		
                                    $descripcion=$row1['descripcion'];             	  
                                }
                            ?>
                                <option value="<?php echo $id_municipio ?>"readonly><?php echo $descripcion ?></option>
                                <?php 
                                    $con11 = mysqli_query($con,"SELECT * FROM municipios");
                                    $reg = mysqli_fetch_array($con11);
                                    do {
                                        $id_mun = $reg['id_municipio'];
                                        $des_mun = $reg['descripcion'];
                                ?>
                                <option value="<?php echo $id_mun;?>" ><?php echo $des_mun;?> </option>
                                <?php 
                                    } 
                                    while($reg=mysqli_fetch_array($con11));
                                ?>           
                            </select> 
                        </div>
                    </div>
                </div> 

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono</label>
                    <div class="col-md-8">
                        <input id="textinput" name="telefono" type="tel" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required value="<?php echo $telefono?>">                  
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="email_usu" type="text" placeholder="" class="form-control input-md" required value="<?php echo $correo ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Usuario</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="usuario" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toLowerCase()" required value="<?php echo $usuario ?>">  
                    </div>
                </div>                                     
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Tipo de perfil</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="id_entidad" type="text" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $id_entidad ?>">                      
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label letra n600 azulo" for="textinput">Contraseña</label>  
                    <div class="col-md-8">
                        <input id="textinput" name="clave" type="password" placeholder="" class="form-control input-md" onkeyup = "this.value=this.value.toUpperCase()" required value="<?php echo $clave ?>">                      
                    </div>
                </div>
                                </div>

                                <!--Botón para realizar el update-->
                                <div class="form-group <?= $visiblemod ?>" >
                        <label class="col-md-8 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary" >Actualizar</button><br><br>
                        </div>
                                                
                

           
        </form>
    </div>    
   </div> <br>

                <!--<div class="form-group" style="display:none">
                    <label class="col-md-4 control-label letra n600 azulo" for="radios">Autorizar Acceso<span class="centrar letra n600 azulo pi"></span></label>
                    <div class="col-md-8"> 
                        <label class="radio-inline" for="radios-0">
                            <input <?php if($estado=="1"){echo "checked";} ?> value="1" type="radio" name="estado"/>Autorizado 
                        </label> 
                        <label class="radio-inline" for="radios-1">      
                            <input <?php if($estado=="0"){echo "checked";} ?> value="0" type="radio" name="estado"/>Denegado     
                        </label>                  
                    </div>
                </div> --> 
                               
                </fieldset>                

    <?php 
        if($_POST){ //si se ha presionado enviar
            $id_usu=$_POST['id_usu'];
            $nombres=$_POST['nombres'];
            $apellidos=$_POST['apellidos'];
            $numero_documento=$_POST['numero_documento'];
            $id_tipo_documento=$_POST['id_tipo_documento'];  
            $id_genero=$_POST['id_genero'];
            $id_municipio=$_POST['id_municipio'];
            $id_perfil=$_POST['id_perfil'];
            $telefono=$_POST['telefono'];
            $email_usu=$_POST['email_usu'];
            $usuario=$_POST['usuario'];
            $clave=sha1($_POST['clave']);
            $id_entidad=$_POST['id_entidad'];
            $fecha_ing =$_POST['fecha'];
            
            mysqli_query($con,"UPDATE `usuarios` SET 
                apellidos='$apellidos',
                nombres='$nombres',
                numero_documento='$numero_documento',
                id_genero='$id_genero',
                id_municipio='$id_municipio',
                telefono='$telefono',
                usuario='$usuario',
                clave='$clave',
                correo='$email_usu',
                id_perfil='$id_perfil',
                id_entidad=' $id_entidad',
                
                WHERE id_usuario='$id_usuario'");

         //Terminar la tarea y redireccionar a la lista de usuarios
            mysqli_close($con);
        echo '<script language = javascript>
            alert("la Informacion ha sido Guardada Correctamente")
            self.location = "main.php?key=54"
            </script>'; 
        }
    ?>
    

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