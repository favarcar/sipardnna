  <script>
        function obtenerMunicipios(val) {
            $.ajax({
                type: "POST",
                url: "get_municipio.php",
                data: 'id_departamento=' + val,
                success: function(data) {
                    $("#municipio_nna").html(data);
                }
            });
        }

        function obtenerProvincia(val) {
            $.ajax({
                type: "POST",
                url: "get_provincia.php",
                data: 'id_municipio=' + val,
                success: function(data) {
                    $("#provincia_nna").html(data);
                }
            });
        }

        function obtenerEps(val) {
            $.ajax({
                type: "POST",
                url: "get_eps.php",
                data: 'id_regimen=' + val,
                success: function(data) {
                    $("#eps_nna").html(data);
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

                        $("#departamento_nna").html(data);
                        $("#municipio_nna").html(data);
                        $("#provincia_nna").html(data);

                    } else if (iden == '1' && val == '42') {
                        $("#departamento_nna").html(data);
                    }

                    if (iden == '2') {

                        $("#municipio_nna").html(data);
                    }
                    if (iden == '3') {

                        $("#provincia_nna").html(data);
                    }

                }
            });
        }
    </script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php
    $id_ninnos = $_GET['id_ninnos'];
    $ingresar_mpc = mysqli_query($con, "SELECT * FROM ninnosnna WHERE id_ninnos = '$id_ninnos' "); //cambiar nombre de la tabla de busqueda
    while ($row = mysqli_fetch_array($ingresar_mpc)) {
        $id_ninnos1 = $row['id_ninnos'];
        $id_tipo_documento = $row['id_tipo_documento'];
        $No_identificacion = $row['No_identificacion'];
        $Nombres = $row['Nombres'];
        $Apellidos = $row['Apellidos'];
        $Fecha_Nacimiento = $row['Fecha_Nacimiento'];
        $Edad = $row['Edad'];
        $Direccion = $row['Direccion'];
        $id_genero = $row['id_genero'];
        $id_estrato = $row['id_estrato'];
        $id_niveleducativo = $row['id_niveleducativo'];
        $id_cuidadores = $row['id_cuidadores'];
        $id_departamento = $row['id_departamento'];
        $id_municipio = $row['id_municipio'];
        $id_provincia = $row['id_provincia'];
        $id_regimen = $row['id_regimen'];
        $id_eps = $row['id_eps'];
        $id_etnia = $row['id_etnia'];
        $Puntaje_Sisben = $row['Puntaje_Sisben'];
        $id_zona = $row['id_zona'];
        $fecha_ingreso = $row['fecha_ingreso'];
        $id_usuario = $row['id_usuario'];
    }
    date_default_timezone_set('America/Bogota');
    $time = time();
    $fecha = date("Y-m-d", $time);
?>
    <section class="fblanco">
        <div class="container pi3x">
        <h3 class="centrar letra n600 azulo pi">Registrar Formulario Madres, Padres o Cuidadores</h3>
            <form class="form-horizontal num-columnas2 ps2x" method="post" enctype="multipart/form-data">
                <fieldset>
                    <!-- Form Name -->
                    <!-- Appended checkbox -->
                    <!-- Appended checkbox -->
                    <!-- Text input-->
                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. Documento N.N.A.</label>
                        <div class="col-md-8">
                            <input id="textinput" name="nom_nna" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $Apellidos;  ?> <?php echo $Nombres; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">N. Documento N.N.A.</label>
                        <div class="col-md-8">
                            <input id="textinput" name="num_nna" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeypress="return numeros(event)" value="<?php echo $No_identificacion; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Nombres</label>
                        <div class="col-md-8">
                            <input id="textinput" name="nom_nna" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeyup="this.value=this.value.toUpperCase()" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Apellidos</label>
                        <div class="col-md-8">
                            <input id="textinput" name="ape_nna" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;" onkeyup="this.value=this.value.toUpperCase()" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Tipo de Documento</label>
                        <div class="col-md-8">
                            <select name="tip_doc_nna" id="tip_doc_nna" class="form-control" style="text-transform: uppercase;" required>
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
                            <input id="textinput" name="num_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Fecha Nacimiento</label>
                        <div class="col-md-8">
                            <input id="fecha_nna" name="fecha_nna" type="date" placeholder="" class="form-control input-md" onchange="calculate_age()" onkeypress="return numeros(event)">
                            <script type="text/javascript">
                                function calculate_age() {
                                    var dob = new Date($("#fecha_nna").val());
                                    var diff_ms = Date.now() - dob.getTime();
                                    var age_dt = new Date(diff_ms);

                                    var age = Math.abs(age_dt.getUTCFullYear() - 1970);
                                    $("#edad_nna").val(age);
                                }
                            </script>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Edad</label>
                        <div class="col-md-8">
                            <input id="edad_nna" name="edad_nna" type="text" placeholder="" class="form-control input-md" onkeypress="return numeros(event)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Genero</label>
                        <div class="col-md-8">
                            <select name="genero_nna" id="genero_nna" class="form-control" style="text-transform: uppercase;" required>
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

                    <?php
                    $consulta_Pais = $mysqli->query("SELECT Id_Pais,Nombre FROM paises ORDER BY Nombre");
                    $consulta_departamentos = $mysqli->query("SELECT id, descripcion FROM departamentos ORDER BY descripcion");
                    $consulta_municipios    = $mysqli->query("SELECT id_municipio, descripcion FROM municipios ORDER BY descripcion");
                    $consulta_provincia = $mysqli->query("SELECT id_provincia, descripcion_prov FROM provincias ORDER BY descripcion_prov");
                    $consulta_regimen = $mysqli->query("SELECT id_regimen, descripcion FROM regimenes");
                    $consulta_eps = $mysqli->query("SELECT id_eps, descripcion FROM eps ORDER BY descripcion");
                    ?>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Pais de nacimiento</label>
                        <div class="col-md-8">
                            <select name="pais_nna" id="pais_nna" class="form-control" onchange="obtenerDepartamento(this.value, '1')" required>
                                <option value=''>SELECCIONE</option>

                                <?php
                                while ($row = $consulta_Pais->fetch_object()) {
                                    echo "<option value = '" . $row->Id_Pais . "' >" . $row->Nombre . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Departamento</label>
                        <div class="col-md-8">
                            <select name="departamento_nna" id="departamento_nna" class="form-control" onchange="obtenerDepartamento(this.value, '2')" required>
                                <option value=''>SELECCIONE</option>
                                <?php
                                while ($row = $consulta_departamentos->fetch_object()) {
                                    echo "<option value = '" . $row->id . "' >" . $row->descripcion . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Municipio</label>
                        <div class="col-md-8">
                            <select name="municipio_nna" id="municipio_nna" class="form-control" style="text-transform: uppercase;" onchange="obtenerDepartamento(this.value, '3')" required>
                                <option value="">Seleccione</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="cual_mun">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Escriba el municipio</label>
                        <div class="col-md-8">
                            <input id="mun_aux" name="mun_aux" type="text" placeholder="¿Escriba cual?" style="text-transform: uppercase;" class="form-control input-md">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Provincia</label>
                        <div class="col-md-8">
                            <select name="provincia_nna" id="provincia_nna" class="form-control" style="text-transform: uppercase;" required>
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Dirección</label>
                        <div class="col-md-8">
                            <input id="textinput" name="dir_nna" type="text" placeholder="" class="form-control input-md" style="text-transform: uppercase;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Teléfono</label>
                        <div class="col-md-8">
                            <input id="textinput" name="tel_nna" type="tel" placeholder="" class="form-control input-md" onkeypress="return numeros(event)" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Email</label>
                        <div class="col-md-8">
                            <input id="textinput" name="email_nna" type="email" placeholder="" class="form-control input-md" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Estrato</label>
                        <div class="col-md-8">
                            <select name="estrato_nna" id="estrato_nna" class="form-control" style="text-transform: uppercase;" required>
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
                            <select name="nivel_educa_nna" id="nivel_educa_nna" class="form-control" style="text-transform: uppercase;" required>
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
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Reg&iacute;menes</label>
                        <div class="col-md-8">
                            <select name="regimen_nna" id="regimen_nna" class="form-control" style="text-transform: uppercase;" onchange="obtenerEps(this.value);" required>
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
                                <select name="eps_nna" id="eps_nna" class="form-control" style="text-transform: uppercase;" required>
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
                            <select name="etnias_nna" id="etnias_nna" style="text-transform: uppercase;" class="form-control" required>
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
                        <label class="col-md-4 control-label letra n600 azulo" for="textinput">Puntaje del Sisb&eacute;n</label>
                        <div class="col-md-8">
                            <input id="textinput" name="sisben_nna" type="text" placeholder="" pattern="[A][1-5]{1}$|[B][1-7]{1}$|([C]([1-9]|1[0-8])$)|[D]([1-9]|1[0-9]|2[0-1])$"class="form-control input-md" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label letra n600 azulo" for="buttondropdown">Zona</label>
                        <div class="col-md-8">
                            <select name="zona_nna" id="zona_nna" style="text-transform: uppercase;" class="form-control" required>
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

        $nom_nna = $_POST['nom_nna'];
        $ape_nna = $_POST['ape_nna'];
        $tip_doc_nna = $_POST['tip_doc_nna'];
        $num_nna = $_POST['num_nna'];
        $fecha_nna = $_POST['fecha_nna'];
        $genero_nna = $_POST['genero_nna'];
        $edad_nna = $_POST['edad_nna'];
        $pais_nna = $_POST['pais_nna'];
        $departamento_nna = $_POST['departamento_nna'];
        //$municipio_nna=$_POST['municipio_nna'];
        if ($_POST['municipio_nna'] == "OTRO") {
            $municipio_nna = $_POST['mun_aux'];
            $query = "INSERT INTO municipios (id_municipio, descripcion) VALUES ('$municipio_nna', '$municipio_nna');";
            mysqli_query($con, $query);
        } else {
            $municipio_nna = $_POST['municipio_nna'];
        }
        $provincia_nna = $_POST['provincia_nna'];
        $dir_nna = $_POST['dir_nna'];
        $tel_nna = $_POST['tel_nna'];
        $email_nna = $_POST['email_nna'];
        $estrato_nna = $_POST['estrato_nna'];
        $nivel_educa_nna = $_POST['nivel_educa_nna'];
        $regimen_nna = $_POST['regimen_nna'];
        $eps_nna = $_POST['eps_nna'];
        $etnias_nna = $_POST['etnias_nna'];
        $sisben_nna = $_POST['sisben_nna'];
        $zona_nna = $_POST['zona_nna'];
        $fecha_ing = $fecha;
        $cuidadores_nna = 0;
        $parentescos = $_POST['parentescos'];
        $estado_civil = $_POST['estado_civil'];




        $sql = "INSERT INTO cuidadores (id_tipo_documento, No_Cedula, Nombres_cuidadores,Apellidos_cuidadores, Fecha_Nacimiento, Edad, Direccion, telefono_movil, correo_electronico, id_parentesco, id_estado, id_estrato, id_etnia, id_genero, id_niveleducativo, id_regimen, id_eps, id_municipio, id_provincia, id_zona, Puntaje_Sisben, fecha_cuida, id_usuario, id_ninos, id_departamento, id_pais) VALUES ('$tip_doc_nna','$num_nna','$nom_nna','$ape_nna','$fecha_nna','$edad_nna','$dir_nna','$tel_nna','$email_nna','$parentescos','$estado_civil','$estrato_nna','$etnias_nna','$genero_nna','$nivel_educa_nna','$regimen_nna','$eps_nna','$municipio_nna','$provincia_nna','$zona_nna','$sisben_nna','$fecha_ing','$id_usuario','$id_ninnos','$departamento_nna','$pais_nna')";
        
     

        if (mysqli_query($con, $sql) or Die(mysqli_error($con))) {
            echo '<script language = javascript>
            alert("la Información ha sido Guardada Correctamente")
            self.location = "main.php?key=12"
            </script>';
        } else {
            echo '<script language = javascript>
            alert("Error")
            
            </script>';
        }

        mysqli_close($con);
    }
  //  if (isset($_POST['singlebutton'])){

  //      $id_ninnos1 = $_POST['id_ninnos'];
  //      $id_cuidadores = $_POST['id_cuidadores'];

  //      mysqli_query($con, "UPDATE ninnosnna SET id_cuidadores='$id_ninnos1', WHERE id_ninnos='$id_ninnos'"); mysqli_close($con);
   // }
    ?>
    </form>

    <script>
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

</html>