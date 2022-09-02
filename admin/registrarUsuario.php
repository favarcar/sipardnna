<script>
        function obtenerMunicipios(val) {
            $.ajax({
                type: "POST",
                url: "get_municipio.php",
                data: 'id_departamento=' + val,
                success: function(data) {
                    $("#municipio_usu").html(data);
                }
            });
        }

        function obtenerProvincia(val) {
            $.ajax({
                type: "POST",
                url: "get_provincia.php",
                data: 'id_municipio=' + val,
                success: function(data) {
                    $("#provincia_usu").html(data);
                }
            });
        }

        function obtenerEps(val) {
            $.ajax({
                type: "POST",
                url: "get_eps.php",
                data: 'id_regimen=' + val,
                success: function(data) {
                    $("#eps_usu").html(data);
                }
            });
        }

        function obtenerDepartamento(val, iden) {
            $.ajax({
                type: "POST",
                url: "get_departamentos.php",
                data: {
                    id: val,
                    identificador: iden
                },
                success: function(data) {

                    if (iden == '1' && val != '42') {

                        $("#departamento_usu").html(data);
                        $("#municipio_usu").html(data);
                        $("#provincia_usu").html(data);

                    } else if (iden == '1' && val == '42') {
                        $("#departamento_usu").html(data);
                    }

                    if (iden == '2') {

                        $("#municipio_usu").html(data);
                    }
                    if (iden == '3') {

                        $("#provincia_usu").html(data);
                    }

                }
            });
        }
    </script>
</head>
<?php     
    date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha = date("Y-m-d", $time);
    ?>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <br><br>
        <h2 class="centrar letra n600 azulo pi">Registrar Usuario</h2>
                    
  <!--      <section class="fblanco">
            <div class="container pu pi">
            <section class="fblanco">
        <div class="container ps2x ">
            <div class="row clearfix centrar">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                </div>
            </div>
        </div>
    </section>-->


    <section class="fblanco">
        <div class="container">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="font-size:21px">
                        <i class="fa fa-list"></i> Información de ingreso
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form class="form-horizontal num-columnas2 ps2x" method="post" enctype="multipart/form-data">
                    

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>
                        <div class="col-md-8">
                            <input id="textinput" name="nom_usu" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeyup="this.value=this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>
                        <div class="col-md-8">
                            <input id="textinput" name="ape_usu" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeyup="this.value=this.value.toUpperCase()" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label>
                        <div class="col-md-8">
                            <select name="tip_doc_usu" id="tip_doc_usu" class="form-control" style="text-transform: uppercase;" required>
                                <option value="">Seleccione</option>
                                <?php
                                $con1 = mysqli_query($con, "select * from  tipos_documentos");
                                $reg = mysqli_fetch_array($con1);
                                do {
                                    $id = $reg['id_tipo_documento'];
                                    $des = $reg['descripcion'];
                                ?>
                                    <option value="<?php echo $id; ?>"><?php echo $des; ?> </option>
                                <?php } while ($reg = mysqli_fetch_array($con1)); ?>
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. de Documento</label>
                        <div class="col-md-8">
                            <input id="textinput" name="num_usu" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Genero</label>
                        <div class="col-md-8">
                            <select name="genero_usu" id="genero_usu" class="form-control" style="text-transform: uppercase;" required>
                                <option value="">Seleccione</option>
                                <?php
                                include("../conexion/conexion.php");
                                $con1 = mysqli_query($con, "select * from  generos");
                                $reg1 = mysqli_fetch_array($con1);
                                do {
                                    $id_genero = $reg1['id_genero'];
                                    $descripcion = $reg1['descripcion'];
                                ?>
                                    <option value="<?php echo $id_genero; ?>"><?php echo $descripcion; ?> </option>
                                <?php
                                } while ($reg1 = mysqli_fetch_array($con1));
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio de residencia</label>
                        <div class="col-md-8">
                            <select name="municipio_usu" id="municipio_usu" class="form-control" style="text-transform: uppercase;" onchange="obtenerDepartamento(this.value, '3')" required>
                                <option value="">Seleccione</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Provincia de residencia</label>
                        <div class="col-md-8">
                            <select name="provincia_usu" id="provincia_usu" class="form-control" style="text-transform: uppercase;" required>
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="cual_mun">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Lugar de nacimiento</label>
                        <div class="col-md-8">
                            <input id="mun_aux" name="mun_aux" type="text" placeholder="PAIS - CIUDAD" style="text-transform: uppercase;" class="form-control input-md">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Dirección</label>
                        <div class="col-md-8">
                            <input id="textinput" name="dir_usu" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono móvil</label>
                        <div class="col-md-8">
                            <input id="textinput" name="tel_usu" type="tel" minlength="10" maxlength="10" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>
                        <div class="col-md-8">
                            <input id="textinput" name="email_usu" type="email" placeholder="" class="form-control input-md">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estrato</label>
                        <div class="col-md-8">
                            <select name="estrato_usu" id="estrato_usu" class="form-control" style="text-transform: uppercase;" required>
                                <option value="">Seleccione</option>
                                <?php
                                $con4 = mysqli_query($con, "select * from estratos");
                                $reg4 = mysqli_fetch_array($con4);
                                do {
                                    $id_estrato = $reg4['id_estrato'];
                                    $des_estrato = $reg4['descripcion'];
                                ?>
                                    <option value="<?php echo $id_estrato; ?>"><?php echo $des_estrato; ?> </option>
                                <?php } while ($reg4 = mysqli_fetch_array($con4));    ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Nivel Educativo</label>
                        <div class="col-md-8">
                            <select name="nivel_educa_usu" id="nivel_educa_usu" class="form-control" style="text-transform: uppercase;" required>
                                <option value="">Seleccione</option>
                                <?php
                                $con5 = mysqli_query($con, "select * from nivel_educativo");
                                $reg5 = mysqli_fetch_array($con5);
                                do {
                                    $id_niveleducativo = $reg5['id_niveleducativo'];
                                    $des_niveleducativo = $reg5['descripcion'];
                                ?>
                                    <option value="<?php echo $id_niveleducativo; ?>"><?php echo $des_niveleducativo; ?> </option>
                                <?php } while ($reg5 = mysqli_fetch_array($con5)); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Régimen</label>
                        <div class="col-md-8">
                            <select name="regimen_usu" id="regimen_usu" class="form-control" style="text-transform: uppercase;" onchange="obtenerEps(this.value);" required>
                                <option value="">Seleccione</option>
                                <?php
                                while ($row = $consulta_regimen->fetch_object()) {
                                    echo "<option value = '" . $row->id_regimen . "' >" . $row->descripcion . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">EPS</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <select name="eps_usu" id="eps_usu" class="form-control" style="text-transform: uppercase;" required>
                                    <option value="">Seleccione</option>
                                    <?php
                                    while ($row = $consulta_eps->fetch_object()) {
                                        echo "<option value = '" . $row->id_eps . "' >" . $row->descripcion . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Etnias</label>
                        <div class="col-md-8">
                            <select name="etnias_usu" id="etnias_usu" style="text-transform: uppercase;" class="form-control" required>
                                <option value="">Seleccione</option>
                                <?php
                                $con8 = mysqli_query($con, "select * from etnias");
                                $reg8 = mysqli_fetch_array($con8);
                                do {
                                    $id_etnia = $reg8['id_etnia'];
                                    $des_etnia = $reg8['descripcion'];
                                ?>
                                    <option value="<?php echo $id_etnia; ?>"><?php echo $des_etnia; ?> </option>
                                <?php } while ($reg8 = mysqli_fetch_array($con8)); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Categoría del Sisb&eacute;n</label>
                        <div class="col-md-8">
                            <input id="textinput" name="sisben_usu" type="text" placeholder="Categorías [A1-A5] [B1-B7] [C1-C18] [D1-D21]" pattern="[A][1-5]{1}$|[B][1-7]{1}$|([C]([1-9]|1[0-8])$)|[D]([1-9]|1[0-9]|2[0-1])$[a][1-5]{1}$|[b][1-7]{1}$|([c]([1-9]|1[0-8])$)|[d]([1-9]|1[0-9]|2[0-1])$"class="form-control input-md" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Zona</label>
                        <div class="col-md-8">
                            <select name="zona_usu" id="zona_usu" style="text-transform: uppercase;" class="form-control" required>
                                <option value="">Seleccione</option>
                                <?php
                                $con9 = mysqli_query($con, "select * from zonas");
                                $reg9 = mysqli_fetch_array($con9);
                                do {
                                    $id_zona = $reg9['id_zona'];
                                    $des_zona = $reg9['descripcion'];
                                ?>
                                    <option value="<?php echo $id_zona; ?>"><?php echo $des_zona; ?> </option>
                                <?php } while ($reg9 = mysqli_fetch_array($con9)); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Parentesco</label>
                        <div class="col-md-8">
                            <select name="parentescos" id="parentescos" style="text-transform: uppercase;" class="form-control" required>
                                <option value="">Seleccione</option>
                                <?php
                                $con20 = mysqli_query($con, "select * from parentescos");
                                $reg20 = mysqli_fetch_array($con20);
                                do {
                                    $id_parentesco = $reg20['id_parentesco'];
                                    $des_parentesco = $reg20['descripcion'];
                                ?>
                                    <option value="<?php echo $id_parentesco; ?>"><?php echo $des_parentesco; ?> </option>
                                <?php
                                } while ($reg20 = mysqli_fetch_array($con20));
                                ?>



                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estado Civil</label>
                        <div class="col-md-8">
                            <select name="estado_civil" id="estado_civil" style="text-transform: uppercase;" class="form-control" required>
                                <option value="">Seleccione</option>
                                <?php
                                $con21 = mysqli_query($con, "select * from estados_civiles");
                                $reg21 = mysqli_fetch_array($con21);
                                do {
                                    $id_estado = $reg21['id_estado'];
                                    $des_estado = $reg21['descripcion'];
                                ?>
                                    <option value="<?php echo $id_estado; ?>"><?php echo $des_estado; ?> </option>
                                <?php
                                } while ($reg21 = mysqli_fetch_array($con21));
                                ?>

                            </select>
                        </div>
                    </div>

                    <?php if($nuser == 1 || $nuser == 2){?>
                   <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-8">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                    
	  <?php } ?>
                </fieldset>
            </form>

        </div>
    </section>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="../js/vendor/bootstrap.min.js"></script>

    <script src="../js/jsAddMPC.js"></script>

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
    <?php
    if ($_POST) { //si se ha presionado enviar

        $nombres_usu = $_POST['nom_usu'];
        $apellidos_usu = $_POST['ape_usu'];
        $id_tipo_documento = $_POST['tip_doc_usu'];
        $numero_documento_usu = $_POST['num_usu'];
        $genero_usu = $_POST['genero_usu'];
        if ($_POST['municipio_usu'] == "OTRO") {
            $id_municipio_usu = $_POST['mun_aux'];
            $query = "INSERT INTO municipios (id_municipio, descripcion) VALUES ('$id_municipio_usu', '$id_municipio_usu');";
            mysqli_query($con, $query);
        } else {
            $id_municipio_usu = $_POST['municipio_usu'];
        }
        $telefono_usu = $_POST['tel_usu'];
        $correo_usu = $_POST['email_usu'];
        $fecha_registro = $fecha;
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $id_perfil = $_POST['id_perfil'];        
        $estado = $_POST['estado'];
             




        $sql1 = "INSERT INTO usuarios (apellidos, nombres, id_tipo_documento, numero_documento, id_genero, id_municipio, telefono, usuario, clave, correo, id_perfil, estado, fecha_registro) 
        VALUES ('$apellidos_usu','$nombres_usu','$id_tipo_documento_usu','$numero_documento_usu','$genero_usu','$id_municipio_usu','$telefono_usu','$usuario','$clave','$correo_usu','$id_perfil','$estado','$fecha_registro')";
     

        if (mysqli_query($con, $sql1) or Die(mysqli_error($con))) {
            echo '<script language = javascript>
            alert("la Información ha sido Guardada Correctamente")
            self.location = "main.php?key=54"
            </script>';
        } else {
            echo '<script language = javascript>
            alert("Error")
            self.location = "main.php?key=54"
            
            </script>';
        }

        mysqli_close($con);
    }
  //  if (isset($_POST['singlebutton'])){

  //      $id_ninnos1 = $_POST['id_ninnos'];
  //      $id_cuidadores = $_POST['id_cuidadores'];

  //      mysqli_query($con, "UPDATE ninnosusu SET id_cuidadores='$id_ninnos1', WHERE id_ninnos='$id_ninnos'"); mysqli_close($con);
   // }
    ?>
    </form>

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